<?php

namespace App\Model;

use App\Models\Customer;
use App\Models\Staff;
use App\Models\TransactionStatus;
use App\Models\Util\Crud;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class Transaction extends Model implements Crud
{
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function procedure()
    {
        return $this->belongsTo(Procedure::class);
    }

    public function staff()
    {
        return $this->belongsTo(Staff::class);
    }

    public function transactionStatus()
    {
        return $this->belongsTo(TransactionStatus::class);
    }

    protected $fillable = array(
        'price',
        'paid',
        'description'
    );

    const STORE_TRANSACTION = 'store_transaction';

    const UPDATE_TRANSACTION = 'update_transaction';

    const DELETE_TRANSACTION = 'delete_transaction';

    const READ_TRANSACTION = 'read_transaction';

    const SHOW_TRANSACTION = 'read_transaction';


    public function create($object, $arguments = [])
    {
        // TODO: Implement create() method.
    }

    public function remove($object_id, $arguments = [])
    {
        // TODO: Implement remove() method.
    }

    public function edit($object, $arguments = [])
    {
        // TODO: Implement edit() method.
    }

    public function read($object_id, $arguments = [])
    {
        return Transaction::where('activated', true)->where('id', $object_id)->first();
    }

    public function read_of_customer($customer_id, $arguments = [])
    {
        $transactions = Transaction::where('activated', true)
            ->where('customer_id', $customer_id)->get();
        return $transactions->groupBy('procedure.staff_category.name');
    }

    public function read_all($arguments = [])
    {
        // TODO: Implement read_all() method.
    }

    public function filter($input = [])
    {
        // TODO: Implement filter() method.
    }

    private function filter_transactions($start_date, $end_date, $procedure_ids = null, $status_id = null,$staff_id = null){

        return DB::table('transactions')
            ->join('procedures', 'transactions.procedure_id', '=', 'procedures.id')
            ->where('transactions.transaction_date' ,'>=', $start_date)
            ->where('transactions.transaction_date', '<=', $end_date)
            ->when($procedure_ids,function ($query) use ($procedure_ids){
                return $query->whereIn('procedure_id',$procedure_ids);
            })->when($status_id,function ($query) use ($status_id){
                return $query->where('transaction_status_id',$status_id);
            })->when($staff_id,function ($query) use ($staff_id){
                return $query->where('staff_id',$staff_id);
            })->selectRaw('sum(transactions.price) as price, sum(transactions.cost_price) as cost_price, procedures.name as name')->groupBy('name')->get();
    }

    private function filter_generic_transactions($start_date, $end_date, $procedure_ids = null, $status_id = null, $staff_id = null){
        return DB::table('transactions')
            ->where('transactions.transaction_date' ,'>=', $start_date)
            ->where('transactions.transaction_date', '<=', $end_date)
            ->when($procedure_ids,function ($query) use ($procedure_ids){
                return $query->whereIn('procedure_id',$procedure_ids);
            })->when($status_id,function ($query) use ($status_id){
                return $query->where('transaction_status_id',$status_id);
            })->when($staff_id,function ($query) use ($staff_id){
                return $query->where('staff_id',$staff_id);
            });
    }

    public function read_group_transaction_by_cateogry($start_date, $end_date, $procedure_ids = null, $status_id = null,$staff_id = null)
    {
        $result = $this->filter_transactions($start_date, $end_date, $procedure_ids,$status_id,$staff_id);

        $set = new Collection();

        foreach ($result as $parcial){
            $set->push(array($parcial->name,$parcial->price,$parcial->cost_price));
        }

        return $set;
    }

    public function resume_data_to_stack_collumn($start_date, $end_date, $procedure_ids = null, $status_id = null,$staff_id = null)
    {
        $data = $this->filter_transactions($start_date, $end_date, $procedure_ids,$status_id,$staff_id);

        $procedures = new Collection();
        $cost_price = new Collection();
        $price = new Collection();

        foreach ($data as $parcial){
            $procedures->push($parcial->name);
            $cost_price->push($parcial->cost_price);
            $price->push($parcial->price - $parcial->cost_price);
        }

        return array('name' => $procedures, 'cost_price' => $cost_price, 'price' => $price);
    }

    public function transactions_by_day_total_value($start_date,$end_date){

        $result  = $this->filter_generic_transactions($start_date,$end_date)
            ->selectRaw('sum(price) as price, sum(cost_price) as cost_price , transaction_date')
            ->groupBy('transactions.transaction_date')->get();

        $parcial_result = $result;

        $final_result = array();

        foreach ($parcial_result as $item){
            array_push($final_result,array(Carbon::parse($item->transaction_date)->timestamp * 1000,$item->price));
        }
        return $final_result;
    }

    public function transactions_by_day_parcial_value($start_date,$end_date){


        $result  = $this->filter_generic_transactions($start_date,$end_date)
            ->selectRaw('sum(price) as price, sum(cost_price) as cost_price , transaction_date')
            ->groupBy('transactions.transaction_date')->get();

        $parcial_result = $result;

        $final_result = array();

        foreach ($parcial_result as $item){
            array_push($final_result,array(Carbon::parse($item->transaction_date)->timestamp * 1000,$item->price - $item->cost_price));
        }
        return $final_result;
    }

    public function transactinos_operational_contribuition_margin($start_date, $end_date, $procedure_ids = null, $status_id = null, $staff_id = null){
        return $this->filter_generic_transactions($start_date,$end_date,$procedure_ids,$status_id,$staff_id)
            ->selectRaw('sum(price - cost_price) as operational_result')->get()->first()->operational_result;
    }

    public function transactinos_operational_income($start_date, $end_date, $procedure_ids = null, $status_id = null,$staff_id = null){
        return $this->filter_generic_transactions($start_date,$end_date,$procedure_ids,$status_id,$staff_id)
            ->selectRaw('sum(price) as price')->get()->first()->price;
    }

    public function inputs($object)
    {
        // TODO: Implement inputs() method.
    }

    public function rules($id = 0)
    {
        // TODO: Implement rules() method.
    }
}
