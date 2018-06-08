<?php

namespace App\Model;

use App\Models\StaffCategory;
use App\Models\Util\Crud;
use App\Models\Util\ValidatorModel;
use Illuminate\Database\Eloquent\Model;

class Procedure extends Model implements Crud
{
    const STORE_PROCEDURE = 'store_procedure';

    const UPDATE_PROCEDURE = 'update_procedure';

    const DELETE_PROCEDURE = 'delete_procedure';

    const READ_PROCEDURE = 'read_procedure';


    private $attribute = array(
        'name' => 'Nome',
        'price' => 'Preço',
        'cost_price' =>'Preço de Custo',
        'procedure_time' => 'Tempo',
        'staff_category_id' => 'Categoria'
    );

    public function staff_category(){
        return  $this->belongsTo(StaffCategory::class);
    }

    public function transaction(){
        return $this->belongsToMany(Transaction::class);
    }

    public function create($object, $arguments = [])
    {
        if(ValidatorModel::validation($this->inputs($object),$this->rules(),$this->attribute)){
            return $object->save();
        }
    }

    public function remove($object_id, $arguments = [])
    {
        $procedure = Procedure::findorFail($object_id);
        $procedure->activated = false;
        return $procedure->save();
    }

    public function edit($object, $arguments = [])
    {
        $procedure_edit = Procedure::findorFail($object->id);
        $procedure_edit->name = $object->name;
        $procedure_edit->price = $object->price;
        $procedure_edit->cost_price = $object->cost_price;
        $procedure_edit->procedure_time = $object->procedure_time;
        $procedure_edit->staff_category_id = $object->staff_category_id;

        if(ValidatorModel::validation($this->inputs($procedure_edit),$this->rules($procedure_edit->id),$this->attribute)){
            return $procedure_edit->save();
        }
    }

    public function read($object_id, $arguments = [])
    {
        return Procedure::findOrFail($object_id);
    }

    public function read_all($arguments = [])
    {
        return Procedure::where('activated',true)->orderBy('name','desc');
    }

    public function read_by_category($category_id){
        return Procedure::where('activated',true)->where('staff_category_id',$category_id)->orderBy('name','asc');
    }

    public function filter($input = [])
    {
    }

    public function inputs($object)
    {
        return [
            'name' => $object->name,
            'procedure_time' => $object->procedure_time,
            'price' => $object->price,
            'cost_price' =>$object->cost_price,
            'staff_category_id' => $object->staff_category_id,
        ];
    }

    public function rules($id = 0)
    {
        return [
            'name' => 'required',
            'procedure_time' => 'required',
            'price' => 'required|numeric|min:0',
            'cost_price' =>'required|numeric|min:0',
            'staff_category_id' => 'required',
        ];
    }
}
