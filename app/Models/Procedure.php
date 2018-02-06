<?php

namespace App\Model;

use App\Models\Util\Crud;
use Illuminate\Database\Eloquent\Model;

class Procedure extends Model implements Crud
{
    const STORE_PROCEDURE = 'store_procedure';

    const UPDATE_PROCEDURE = 'update_procedure';

    const DELETE_PROCEDURE = 'delete_procedure';

    const READ_PROCEDURE = 'read_procedure';


    protected $fillable = array(
        'name',
        'price',
        'procedure_time'
    );

    public function create($object, $arguments = [])
    {
    }

    public function remove($object_id, $arguments = [])
    {
    }

    public function edit($object, $arguments = [])
    {
    }

    public function read($object_id, $arguments = [])
    {
    }

    public function read_all($arguments = [])
    {
    }

    public function filter($input = [])
    {
    }

    public function inputs($object)
    {
    }

    public function rules($id = 0)
    {
    }
}
