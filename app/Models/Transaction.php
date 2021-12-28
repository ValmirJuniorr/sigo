<?php

namespace App\Models;

use App\Models\Customer;
use App\Models\GroupQuestion;
use App\Models\Question;
use App\Models\Staff;
use App\Models\TransactionStatus;
use App\Models\Util\Constants;
use App\Models\Util\Crud;
use App\Models\Util\ValidatorModel;
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

    /*
     * 'staff_id' => 'required',
            'category_id' => 'required',
            'procedure_id' => 'required',
            'description' => 'required',
     *
     */

    /**
     * Tradução dos atributos da classe
     * @var array
     */
    private $attribute = array(
        'staff_id' => 'Profissional',
        'procedure_id' => 'Procedimento',
        'description' => 'Descrição',
        'staff_id' => 'Funcionario',
        'cost_price' => 'Preço Custo',
        'price' => 'Preço',
        'paid' => 'Situação',
        'transaction_status_id' => 'Status',
    );


    const STORE_TRANSACTION = 'store_transaction';

    const STORE_TRANSACTION_PROCEDURE = 'store_transaction_procedure';

    const UPDATE_TRANSACTION = 'update_transaction';

    const DELETE_TRANSACTION = 'delete_transaction';

    const READ_TRANSACTION = 'read_transaction';

    const SHOW_TRANSACTION = 'read_transaction';

    const RESUME_TRANSACTIONS_REPORT = 'resune_transactions_report';

    const DEFAULT_LIMIT = 10;

    public function create($object, $arguments = [])
    {
        if(ValidatorModel::validation($this->inputs($object),$this->rules(),$this->attribute)){
            $procedure = Procedure::findOrFail($object->procedure_id);
            $object->price = $procedure->price;
            $object->cost_price = $procedure->cost_price;
            $object->transaction_status_id = 1;
            $object->paid = 0;
            return $object->save();
        }
    }

    public function remove($object_id, $arguments = [])
    {
        $transaction = Transaction::findOrFail($object_id);
        return $transaction->delete();
    }

    public function edit($object, $arguments = [])
    {
        if(ValidatorModel::validation($this->inputs_update($object),$this->rules_update(),$this->attribute)){
            $transactionEdit = Transaction::findOrFail($object->id);
            $transactionEdit->staff_id = $object->staff_id;
            $transactionEdit->cost_price = $object->cost_price;
            $transactionEdit->price = $object->price;
            $transactionEdit->paid = $object->paid;
            $transactionEdit->transaction_status_id = $object->transaction_status_id;
            $transactionEdit->description = $object->description;
            $transactionEdit->transaction_date = Carbon::now()->format('Y-m-d');
            return $transactionEdit->save();
        }
    }

    public function read($object_id, $arguments = [])
    {
        $transaction_show = array();
        $transaction = Transaction::where('activated', true)->where('id', $object_id)->first();
        $transaction_show['staff_id'] = $transaction->staff_id;
        $transaction_show['staff'] = $transaction->staff->name;
        $transaction_show['price'] = $transaction->price;
        $transaction_show['cost_price'] = $transaction->cost_price;
        if($transaction->paid){
            $transaction_show['paid_id'] = Constants::TRANSACTION_PAID;
            $transaction_show['paid'] = Constants::TRANSACTION_NAME_PAID;
        }else{
            $transaction_show['paid_id'] = Constants::TRANSACTION_UNPAID;
            $transaction_show['paid'] = Constants::TRANSACTION_NAME_UNPAID;
        }
        $transaction_show['status_id'] = $transaction->transaction_status_id;
        $transaction_show['status'] = $transaction->transactionStatus->name;
        $transaction_show['description'] = $transaction->description;
        return $transaction_show;

    }

    public function show_transaction($object_id){
        return Transaction::where('activated',true)->where('id',$object_id)->first();
    }

    public function read_of_customer_with_all_relation($customer_id, $arguments = [])
    {
        $transactions = Transaction::where('activated', true)
            ->where('customer_id', $customer_id)
            ->with('procedure','staff','transactionStatus')
            ->orderBy('id','DESC')->get();

        return $transactions;
    }

    public function read_one($object_id, $arguments = []){
        $transaction = Transaction::where('activated', true)->where('id', $object_id)->first();
        return $transaction;
    }

    public function read_of_customer($customer_id, $arguments = [])
    {
        $limit = in_array('limit',$arguments) ? $arguments['limit'] : self::DEFAULT_LIMIT;

        $transactions = Transaction::where('activated', true)
            ->where('customer_id', $customer_id)
            ->when($limit,function ($query){
                return $query->limit(self::DEFAULT_LIMIT);
            })->orderBy('id','DESC')->get();

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

    public function read_group_transaction_by_category($start_date, $end_date, $procedure_ids = null, $status_id = null, $staff_id = null)
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

    public function resume_transactions_report($start_date, $end_date, $procedure_ids = null, $status_id = null,$staff_id = null){

        $result = $this->filter_generic_transactions($start_date,$end_date,$procedure_ids,$status_id,$staff_id)
        ->join('procedures', 'transactions.procedure_id', '=', 'procedures.id')
        ->join('customers', 'transactions.customer_id', '=', 'customers.id')
        ->join('staff', 'transactions.staff_id', '=', 'staff.id')
        ->join('transaction_statuses', 'transactions.transaction_status_id', '=', 'transaction_statuses.id')
        ->select('transactions.id as id','transactions.price as price','transactions.cost_price as cost_price',
            'customers.name as customer_name','procedures.name as procedure_name','staff.name  as staff_name',
            'transaction_statuses.name as status_name')->get();

        return array('data' => $result, 'total_price' => $result->sum('price') , 'total_cost_price' => $result->sum('cost_price'));

    }


    public function structure_transaction_result($transaction_id,$answers){
        $rowQuestion = array();
        $dataQuestion = new Collection();
        foreach ($answers as $key => $answer){
            $question = Question::findOrFail($key);
            $rowQuestion['id'] = $question->id;
            $rowQuestion['title'] = $question->title;
            $rowQuestion['answer'] = $answer;
            $rowQuestion['type'] = $question->type;
            $rowQuestion['priority'] = $question->priority;
            $rowQuestion['group_question_id'] = $question->group_question_id;
            $dataQuestion->push($rowQuestion);
            unset($rowQuestion);
          }
       $data = $this->setStrucutureGroup($dataQuestion->groupBy('group_question_id'));
       $transaction = Transaction::findOrFail($transaction_id);
      $transaction->procedure_answers = $data;
      return $transaction->save();
    }


    public function setStrucutureGroup($questions){
        $groupQuestion = new Collection();
        foreach ($questions as $key => $value){
            $group = GroupQuestion::findOrFail($key);
            $group->questions = $value;
            $groupQuestion->push($group);
        }
        return $groupQuestion;
    }


    public function inputs($object)
    {
        return [
            'staff_id' => $object->staff_id,
            'procedure_id' => $object->procedure_id,
            'description' => $object->description,
        ];
    }

    public function rules($id = 0)
    {
        return [
            'staff_id' => 'required',
            'procedure_id' => 'required',
            'description' => '',
        ];
    }

    public function inputs_update($object)
    {
        return [
            'staff_id' => $object->staff_id,
            'cost_price' => $object->cost_price,
            'price' => $object->price,
            'paid' => $object->paid,
            'transaction_status_id' => $object->transaction_status_id,
            'description' => $object->description,
        ];
    }

    public function rules_update($id = 0)
    {
        return [
            'staff_id' => 'required',
            'cost_price' => 'required',
            'price' => 'required',
            'paid' => 'required',
            'transaction_status_id' => 'required',
            'description' => '',
        ];
    }

}
