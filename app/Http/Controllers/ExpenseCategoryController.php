<?php

namespace App\Http\Controllers;

use App\Models\Expensive\ExpenseCategory;
use Illuminate\Http\Request;
use App\Exceptions\Util\ValidationException;
use Illuminate\Support\Facades\Lang;

class ExpenseCategoryController extends Controller
{
    private $expense_category;

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->expense_category = new ExpenseCategory();
    }

    public function read_expense_category(){
        try{
            return view('expense_category.index', ['expense_categories' => $this->expense_category->read_all()->get()]);
        }catch (GeneralException $ge){
            return back()->withErrors($ge->getMessage());
        } catch (Exception $e){
            return back()->withErrors(Lang::get('messages.internal_error'));
        }
    }


    public function create_expense_category(){
        return view('expense_category.create',['expense_category' => $this->expense_category]);
    }

    public function store(Request $request){
        try{
            $this->expense_category->name = $request->input('name');
            $this->expense_category->create($this->expense_category);
            return redirect('/expense_category/read_expense_category');
        }catch (ValidationException $ve){
            return back()->withErrors($ve->getMessage())->withInput();
        }catch (Exception $e){
            return back()->withErrors($e->getMessage());
        }
    }


    public function update_expense_category(Request $request){
        try{
            $id = base64_decode($request->input('id'));
            return view('expense_category.update', ['expense_category' => $this->expense_category->read($id)]);
        }catch (GeneralException $ge){
            return back()->withErrors($ge->getMessage());
        }catch (Exception $e){
            return back()->withErrors(Lang::get('messages.internal_error'));
        }
    }

    public function update(Request $request){
        try{
            $this->expense_category->id = $request->input('id');
            $this->expense_category->name = $request->input('name');
            $this->expense_category->edit($this->expense_category);
            return redirect('/expense_category/read_expense_category');
        }catch (ValidationException $ve){
            return back()->withErrors($ve->getMessage());
        }catch (\Exception $e){
            return back()->withErrors($e->getMessage());
        }
    }

    public function delete_expense_category(Request $request){
        try{
            $expense_category_id = base64_decode($request->input('id'));
            if ($this->expense_category->remove($expense_category_id)){
                return redirect('/expense_category/read_expense_category')->with('success',__('messages.success'));
            }
        }catch (GeneralException $ge){
            return back()->withErrors($ge->getMessage());
        }catch (Exception $e){
            return back()->withErrors(Lang::get('messages.internal_error'));
        }
    }
}
