<?php

namespace App\Http\Controllers;

use App\Exceptions\Util\ValidationException;
use App\Models\Expensive\Expense;
use App\Models\Expensive\ExpenseCategory;
use App\Models\Util\Calendar;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{



    private $expense;
    private $expense_category;

    /**
     * ExpenseController constructor.
     */
    public function __construct()
    {
        $this->expense  = new Expense();
        $this->expense_category = new ExpenseCategory();
    }

    public function index(){

        $expenses = $this->expense->read_all();

        return view('expense.index')->with(array('expenses' => $expenses->get()));
    }

    public function create_expense(){

        $categories = $this->expense_category->read_all();

        return view('expense.create')->with(array('categories' => $categories));
    }

    public function store_expense(Request $request){
        try{
            $this->expense->expire_expense_date = Calendar::invert_date_to_yyyy_mm_dd($request->input('expire_expense_date'));
            $this->expense->price = $request->input('price');
            $this->expense->description = $request->input('description');
            $this->expense->expense_category_id = $request->input('expense_category_id');
            $this->expense->expire_expense_routine_date = Calendar::invert_date_to_yyyy_mm_dd($request->input('expire_expense_routine_date'));
            $this->expense->number_of_days = $request->input('number_of_days');
            if ($this->expense->create($this->expense)){
                return redirect('/expense/index')->with('success','asdasdasda');
            }
        }catch (ValidationException $e){
            return back()->withErrors($e->getMessage());
        }
        return $this->expense;
    }


    public function show_expense(Request $request){

        $expense_id = base64_decode($request->input('id'));

        $categories = $this->expense_category->read_all();

        $expense = $this->expense->read($expense_id);

        return view('expense.show')->with(array('categories' => $categories,'expense' => $expense));
    }

    public function edit_expense(){

    }


}
