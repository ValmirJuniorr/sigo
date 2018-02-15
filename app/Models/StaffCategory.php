<?php

namespace App\Models;

use App\Models\Util\Crud;
use Illuminate\Database\Eloquent\Model;
use App\Models\Util\ValidatorModel;

class StaffCategory extends Model implements Crud
{
    const STORE_STAFF_CATEGORY = 'store_staff_category';

    const UPDATE_STAFF_CATEGORY = 'update_staff_category';

    const DELETE_STAFF_CATEGORY = 'delete_staff_category';

    const READ_STAFF_CATEGORY = 'read_staff_category';


    /**
     * Nome do modelo para serem gerados os logs.
     * @constant String
     */
    const LOG_NAME = "Categoria de Especialistas";

    protected $fillable = array(
        'name'
    );

    protected $attribute = array(
        'name' => 'Nome'
    );

    public function create($object, $arguments = [])
    {
        if(ValidatorModel::validation($this->inputs($object),$this->rules(),$this->attribute)){
            return $object->save();
        }
    }

    public function remove($object_id, $arguments = [])
    {
        return StaffCategory::findOrFail($object_id)->delete();
    }

    public function edit($object, $arguments = [])
    {
        $staff_category_edit = StaffCategory::findorFail($object->id);
        $staff_category_edit->name = $object->name;

        if(ValidatorModel::validation($this->inputs($staff_category_edit),
            $this->rules($staff_category_edit->id),$this->attribute)){
            return $staff_category_edit->save();
        }
    }

    public function read($object_id, $arguments = [])
    {
        return StaffCategory::where('activated',true)->where('id',$object_id)->first();
    }

    public function read_all($arguments = [])
    {
        return StaffCategory::where('activated',TRUE)->orderBy('name');
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
