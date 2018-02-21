<?php

namespace App\Model;

use App\Models\Customer;
use App\Models\Staff;
use App\Models\TransactionStatus;
use App\Models\Util\Crud;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model implements Crud
{
    public function customer(){
        return $this->belongsTo(Customer::class);
    }

    public function procedure(){
        return $this->belongsTo(Procedure::class);
    }

    public function staff(){
        return $this->belongsTo(Staff::class);
    }

    public function transactionStatus(){
        return $this->belongsTo(TransactionStatus::class);
    }

    protected $fillable = array(
        'price',
        'paid',
        'description'
    );

    const STORE_TRANSACTION = 'store_transaction';

    const UPDATE_TRANSACTION = 'update_transaction';

    const DELETE_TRANSACTION = 'delete_transaction';

    const READ_TRANSACTION = 'read_transaction';


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
        return Transaction::where('activated',true)->where('id',$object_id)->first();
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
