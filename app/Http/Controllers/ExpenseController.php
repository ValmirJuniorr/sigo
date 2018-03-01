<?php

namespace App\Http\Controllers;

use App\Exceptions\Util\ValidationException;
use App\Models\Expensive\Expense;
use App\Models\Expensive\ExpenseCategory;
use App\Models\Util\Calendar;
use App\Models\Util\Constants;
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

    public function index_routine_expenses(){
        $expenses = $this->expense->read_all_routine_expenses();
        return view('expense.index_routine_expenses')->with(array('expenses' => $expenses));
    }

    public function create_expense(){

        $categories = $this->expense_category->read_all()->get();

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
                return redirect('/expense/index')->with(Constants::SUCCESS,__('messages.success'));
            }
        }catch (ValidationException $e){
            return back()->withErrors($e->getMessage());
        }
    }

    public function show_expense(Request $request){

        $expense_id = base64_decode($request->input('id'));

        $categories = $this->expense_category->read_all();

        $expense = $this->expense->read($expense_id);

        return view('expense.show')->with(array('categories' => $categories,'expense' => $expense));
    }

    public function edit_expense(Request $request){
        try{
            $this->expense->expire_expense_date = Calendar::invert_date_to_yyyy_mm_dd($request->input('expire_expense_date'));
            $this->expense->id = $request->input('id');
            $this->expense->price = $request->input('price');
            $this->expense->description = $request->input('description');
            $this->expense->expense_category_id = $request->input('expense_category_id');
            $this->expense->expire_expense_routine_date = Calendar::invert_date_to_yyyy_mm_dd($request->input('expire_expense_routine_date'));
            $this->expense->number_of_days = $request->input('number_of_days');
            if ($this->expense->edit($this->expense)){
                return redirect('/expense/index')->with(Constants::SUCCESS,__('messages.success'));
            }
        }catch (ValidationException $e){
            return back()->withErrors($e->getMessage());
        }
    }

    public function remove_expense(Request $request){
        try{
            $expense_id = $request->input('id');
            if ($this->expense->remove($expense_id)){
                return redirect('/expense/index')->with(Constants::SUCCESS,__('messages.success'));
            }
        }catch (ValidationException $e){
            return back()->withErrors($e->getMessage());
        }
    }

    public function show_routine_expense(Request $request){

        $expense_id = base64_decode($request->input('id'));

        $categories = $this->expense_category->read_all();

        $expense = $this->expense->read($expense_id);

        return view('expense.show_routine_expense')->with(array('categories' => $categories,'expense' => $expense));
    }

    public function update_routine_expense(Request $request){
        try{
            $this->expense->id = $request->input('id');
            $this->expense->expire_expense_routine_date = Calendar::invert_date_to_yyyy_mm_dd($request->input('expire_expense_routine_date'));
            $this->expense->number_of_days = $request->input('number_of_days');
            if ($this->expense->update_routine_expense($this->expense)){
                return redirect('/expense/index_routine_expenses')->with(Constants::SUCCESS,__('messages.success'));
            }
        }catch (ValidationException $e){
            return back()->withErrors($e->getMessage());
        }
    }

    public function remove_routine_expense(Request $request){
        try{
            if ($this->expense->remove_routine_expense($request->input('id'))){
                return redirect('/expense/index_routine_expenses')->with(Constants::SUCCESS,__('messages.success'));
            }
        }catch (\Exception $e){
            return back()->withErrors($e->getMessage());
        }
    }

    public function last_expenses(){
        $last_expenses = $this->expense->last_expenses();
        $next_expenses = $this->expense->next_expenses();
        return array('last_expense' => $last_expenses, 'next_expense' => $next_expenses);
    }

    public function expense_by_day(){
        $expenses = $this->expense->expense_by_day();
        return $expenses;
    }

    public function report_expense_by_cateogry(){
        $expenses = $this->expense->report_expense_by_cateogry();
        return $expenses;
    }

}
