<?php

namespace App\Models;

use App\Models\Transaction;
use App\Models\Util\Crud;
use Illuminate\Database\Eloquent\Model;

class TransactionStatus extends Model implements Crud
{
    public function transaction(){
        return $this->belongsToMany(Transaction::class);
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
        return TransactionStatus::orderBy('name');
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
