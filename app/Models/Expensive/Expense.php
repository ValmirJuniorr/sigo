<?php

namespace App\Models\Expensive;

use App\Exceptions\Util\ValidationException;
use App\Models\Util\Crud;
use App\Models\Util\ValidatorModel;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model implements Crud
{

    const STORE_EXPENSE = 'store_expense';

    const UPDATE_EXPENSE = 'update_expense';

    const DELETE_EXPENSE = 'delete_expense';

    const READ_EXPENSE = 'read_expense';

    /**
     * Nome do modelo para serem gerados os logs.
     * @constant String
     */
    const LOG_NAME = "expense";

    /**
     * Atributos da classes que podem ser preenchidos
     *
     * @var array
     */
    protected $fillable = array(
        'expire_expense_date', 'number_of_days', 'expire_expense_routine_date','price'
        ,'expense_category_id','description'
    );

    /**
     * Atributos invisíveis da classe.
     *
     * @var array
     */
    protected $hidden = [
    ];


    /**
     * Tradução dos atributos da classe
     * @var array
     */
    private $attribute = array(
        'expire_expense_date' => 'Vencimento',
        'number_of_days' => 'Intervalo de Dias',
        'expire_expense_routine_date' => 'Rotina',
        'price' => 'Valor',
        'expense_category_id' => 'Tipo de Gasto',
        'description' => 'Descrição',
    );

    public function expense_category(){
        return $this->belongsTo(ExpenseCategory::class);
    }

    public function create($object, $arguments = [])
    {
        if(ValidatorModel::validation($this->inputs($object),$this->rules(),$this->attribute)){
            return $object->save();
        }
    }

    public function remove($object_id, $arguments = [])
    {
        $expense = Expense::findOrFail($object_id);

        if($this->validate_date($expense->expire_expense_date)){
            throw new ValidationException(__('messages.invalid_operation') . ' ' . $expense->expire_expense_date . ' ' . Carbon::now()->format('Y-m-d'));
        }

        return $expense->delete();
    }

    public function edit($object, $arguments = [])
    {
        $expense = Expense::findOrFail($object->id);

        if(ValidatorModel::validation($this->inputs($object),$this->rules(),$this->attribute)){
            $expense->expire_expense_date = $object->expire_expense_date;
            $expense->number_of_days = $object->number_of_days;
            $expense->expire_expense_routine_date = $object->expire_expense_routine_date;
            $expense->price = $object->price;
            $expense->expense_category_id = $object->expense_category_id;
            $expense->description = $object->description;
            return $expense->save();
        }

    }

    public function read($object_id, $arguments = [])
    {
        return Expense::findOrFail($object_id);
    }

    public function read_all($arguments = [])
    {
        return Expense::orderBy('id');
    }

    public function filter($input)
    {
    }

    public function inputs($object)
    {
        return [
            'expire_expense_date' => $object->expire_expense_date,
            'number_of_days' => $object->number_of_days,
            'expire_expense_routine_date' => $object->expire_expense_routine_date,
            'price' => $object->price,
            'expense_category_id' => $object->expense_category_id,
            'description' => $object->description,
        ];
    }

    public function rules($id = 0)
    {
        return [
            'expire_expense_date' => 'required|date|date_format:Y-m-d|after_or_equal:today',
            'number_of_days' => 'nullable|sometimes|integer|min:1',
            'expire_expense_routine_date' => 'nullable|sometimes|date|date_format:Y-m-d|after_or_equal:today',
            'price' => 'required|numeric|min:0  ',
            'expense_category_id' => 'required',
            'description' => 'required',
        ];
    }

    private function validate_date($date_begin){
        return $date_begin < Carbon::now()->format('Y-m-d');
    }
}
