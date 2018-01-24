<?php

namespace App\Models\Expensive;

use App\Models\Util\Crud;
use Illuminate\Database\Eloquent\Model;

class ExpenseCategory extends Model implements Crud
{

    public function expenses(){
        return $this->hasMany(Expense::class);
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
        // TODO: Implement read() method.
    }

    public function read_all($arguments = [])
    {
        return ExpenseCategory::all();
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
