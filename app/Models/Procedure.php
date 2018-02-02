<?php

namespace App\Model;

use App\Models\Util\Crud;
use Illuminate\Database\Eloquent\Model;

class Procedure extends Model implements Crud
{
    const STORE_PROCEDURE = 'read_procedure';

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
        // TODO: Implement read() method.
    }

    public function read_all($arguments = [])
    {
        // TODO: Implement read_all() method.
    }

    public function filter($input = [])
    {
        // TODO: Implement filter() method.
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
