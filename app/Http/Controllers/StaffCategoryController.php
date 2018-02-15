<?php

namespace App\Http\Controllers;

use App\Exceptions\Util\ValidationException;
use App\Models\StaffCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;


class StaffCategoryController extends Controller
{
    private $staff_category;

    /**
     * StaffController constructor.
     */
    public function __construct()
    {
        $this->staff_category = new StaffCategory();
    }


    public function read_staff_category(){
        try{
            return view('staff_category.index', ['staff_categories' => $this->staff_category->read_all()->get()]);
        }catch (GeneralException $ge){
            return back()->withErrors($ge->getMessage());
        } catch (Exception $e){
            return back()->withErrors(Lang::get('messages.internal_error'));
        }
    }


    public function create_staff_category(){
        return view('staff_category.create',['staff_category' => $this->staff_category]);
    }

    public function store(Request $request){
        try{
            $this->staff_category->name = $request->input('name');
            $this->staff_category->create($this->staff_category);
            return redirect('/staff_category/read_staff_category');
        }catch (ValidationException $ve){
            return back()->withErrors($ve->getMessage())->withInput();
        }catch (Exception $e){
            return back()->withErrors($e->getMessage());
        }
    }


    public function update_staff_category(Request $request){
        try{
            $id = base64_decode($request->input('id'));
            return view('staff_category.update', ['staff_category' => $this->staff_category->read($id)]);
        }catch (GeneralException $ge){
            return back()->withErrors($ge->getMessage());
        }catch (Exception $e){
            return back()->withErrors(Lang::get('messages.internal_error'));
        }
    }

    public function update(Request $request){
        try{
            $this->staff_category->id = $request->input('id');
            $this->staff_category->name = $request->input('name');
            $this->staff_category->edit($this->staff_category);
            return redirect('/staff_category/read_staff_category');
        }catch (ValidationException $ve){
            return back()->withErrors($ve->getMessage());
        }catch (\Exception $e){
            return back()->withErrors($e->getMessage());
        }
    }

    public function delete_staff_category(Request $request){
        try{
            $staff_category_id = base64_decode($request->input('id'));
            if ($this->staff_category->remove($staff_category_id)){
                return redirect('/staff_category/read_staff_category')->with('success',__('messages.success'));
            }
        }catch (GeneralException $ge){
            return back()->withErrors($ge->getMessage());
        }catch (Exception $e){
            return back()->withErrors(Lang::get('messages.internal_error'));
        }
    }

}