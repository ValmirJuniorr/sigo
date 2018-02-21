<?php

namespace App\Models;

use App\Model\Transaction;
use Illuminate\Database\Eloquent\Model;

class TransactionStatus extends Model
{
    public function transaction(){
        return $this->belongsToMany(Transaction::class);
    }
}
