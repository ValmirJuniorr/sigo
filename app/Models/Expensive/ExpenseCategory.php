<?php

namespace App\Models\Expensive;

use Illuminate\Database\Eloquent\Model;

class ExpenseCategory extends Model
{

    public function expenses(){
        return $this->hasMany(Expense::class);
    }

}
