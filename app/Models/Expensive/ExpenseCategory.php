<?php

namespace App\Models\Expensive;

use App\Models\Util\Crud;
use Illuminate\Database\Eloquent\Model;
use App\Models\Util\ValidatorModel;


class ExpenseCategory extends Model implements Crud
{

    const STORE_EXPENSE_CATEGORY = 'store_expense_category';

    const UPDATE_EXPENSE_CATEGORY = 'update_expense_category';

    const DELETE_EXPENSE_CATEGORY = 'delete_expense_category';

    const READ_EXPENSE_CATEGORY = 'read_expense_category';

    const LOG_NAME = "Categoria de Gastos";

    protected $fillable = array(
        'name'
    );

    protected $attribute = array(
        'name' => 'Nome'
    );

    public function expenses(){
        return $this->hasMany(Expense::class);
    }

    //
    public function create($object, $arguments = [])
    {
        if(ValidatorModel::validation($this->inputs($object),$this->rules(),$this->attribute)){
            return $object->save();
        }
    }

    public function remove($object_id, $arguments = [])
    {
        return ExpenseCategory::findOrFail($object_id)->delete();
    }

    public function edit($object, $arguments = [])
    {
        $expense_category_edit = ExpenseCategory::findorFail($object->id);
        $expense_category_edit->name = $object->name;

        if(ValidatorModel::validation($this->inputs($expense_category_edit),
            $this->rules($expense_category_edit->id),$this->attribute)){
            return $expense_category_edit->save();
        }
    }

    public function read($object_id, $arguments = [])
    {
        return ExpenseCategory::where('activated',true)->where('id',$object_id)->first();
    }

    public function read_all($arguments = [])
    {
        return ExpenseCategory::orderBy('name');
    }

    public function filter($input = [])
    {
        // TODO: Implement filter() method.
    }

    public function inputs($object)
    {
        return [
            'name' => $object->name
        ];
    }

    public function rules($id = 0)
    {
        return [
            'name' => 'required'
        ];
    }
}
