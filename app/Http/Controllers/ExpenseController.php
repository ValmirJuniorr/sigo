<?php

namespace App\Http\Controllers;

use App\Models\Expensive\Expense;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{



    private $expense;


    /**
     * ExpenseController constructor.
     */
    public function __construct()
    {
        $this->expense  = new Expense();
    }


    public function index(){

        $expenses = $this->expense->read_all();

        return view('expense.index')->with(array('expenses' => $expenses->get()));
    }

    public function create_expense(){
        return view('expense.create');
    }




}
