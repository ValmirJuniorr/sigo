<?php

namespace App\Models;

use App\Models\Util\Crud;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model implements Crud
{

    const STORE_CUSTOMER = 'store_customer';

    const UPDATE_CUSTOMER = 'update_customer';

    const DELETE_CUSTOMER = 'delete_customer';

    const READ_CUSTOMER = 'read_customer';


    public function read_all($arguments = [])
    {
        return Customer::where('activated',TRUE)->orderBy('name');
    }

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
        return Customer::where('activated',true)->where('id',$object_id)->first();
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
