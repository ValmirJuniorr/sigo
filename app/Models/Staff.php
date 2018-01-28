<?php

namespace App\Models;

use App\Models\Util\Crud;
use App\Models\Util\ValidatorModel;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model implements Crud {

    const STORE_STAFF = 'store_staff';

    const UPDATE_STAFF = 'update_staff';

    const DELETE_STAFF = 'delete_staff';

    const READ_STAFF = 'read_staff';


    /**
     * Nome do modelo para serem gerados os logs.
     * @constant String
     */
    const LOG_NAME = "Especialista";

    /**
     * Atributos da classes que podem ser preenchidos
     *
     * @var array
     */

    protected $fillable = array(
        'name',
        'document',
        'uf'
    );

    protected $attribute = array(
        'name' => 'Nome',
        'document' => 'Document',
        'uf' => 'UF'
    );

    public function create($object, $arguments = [])
    {
        if(ValidatorModel::validation($this->inputs($object),$this->rules(),$this->attribute)){
            return $object->save();
        }
    }

    public function remove($object_id, $arguments = [])
    {
        return Staff::findOrFail($object_id)->delete();
    }

    public function edit($object, $arguments = [])
    {
        $staff_edit = Staff::findorFail($object->id);
        $staff_edit->name = $object->name;
        $staff_edit->document = $object->document;
        $staff_edit->uf = $object->uf;

        if(ValidatorModel::validation($this->inputs($staff_edit),$this->rules($staff_edit->id),$this->attribute)){
            return $staff_edit->save();
        }
    }

    public function read($object_id, $arguments = [])
    {
        return Staff::where('activated',true)->where('id',$object_id)->first();
    }

    public function read_all($arguments = [])
    {
        return Staff::where('activated',TRUE)->orderBy('name');
    }

    public function filter($input = [])
    {
        // TODO: Implement filter() method.
    }

    public function inputs($object)
    {
        return [
            'name' => $object->name,
            'document' => $object->document,
            'uf' => $object->uf
        ];
    }

    public function rules($id = 0)
    {
        return [
            'name' => 'required',
            'document' => 'required',
            'uf' => 'required',
        ];
    }
}
