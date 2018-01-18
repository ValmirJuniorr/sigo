<?php

namespace App\Models\Expensive;

use App\Models\Util\Crud;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model implements Crud
{

    public function expense_category(){
        return $this->belongsTo(ExpenseCategory::class);
    }

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

    public function filter($input)
    {
    }

    public function inputs($object)
    {
        return [
            'name' => $object->name,
            'username' => $object->username,
            'password' => $object->password,
            'email' => $object->email,
        ];
    }

    public function rules($id = 0)
    {
        return [
            'expire_expense_date' => 'required',
            '' => 'required|unique:users,username,'.$id,
            'password' => 'required',
            'email' => 'required|email|unique:users,email,'.$id
        ];
    }
}
