<?php

namespace App\Model;

use App\Models\Customer;
use App\Models\Staff;
use App\Models\TransactionStatus;
use App\Models\Util\Crud;
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

    public function read_group_transaction_by_cateogry($start_date, $end_date, $procedure_ids = null,$status_ids = null)
    {
        $transactions = DB::table('transactions')
            ->join('procedures', 'transactions.procedure_id', '=', 'procedures.id')
            ->where('transactions.created_at' ,'>=', $start_date)
            ->where('transactions.created_at', '<=', $end_date)
            ->when($procedure_ids,function ($query) use ($procedure_ids){
                return $query->whereIn('procedure_id',$procedure_ids);
            })->when($status_ids,function ($query) use ($status_ids){
                return $query->whereIn('transaction_status_id',$status_ids);
            })->selectRaw('sum(transactions.price) as price, procedures.name as name')->groupBy('name')->get();
        $transactionData = new Collection();
        foreach ($transactions as $transaction){
            $transactionData->push(array($transaction->name,$transaction->price));
        }
        return $transactionData;
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
