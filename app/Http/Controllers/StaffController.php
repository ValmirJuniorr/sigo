<?php

namespace App\Http\Controllers;

use App\Exceptions\Util\ValidationException;
use App\Models\Staff;
use Illuminate\Http\Request;

class StaffController extends Controller
{

    private $staff;

    /**
     * StaffController constructor.
     */
    public function __construct()
    {
        $this->staff = new Staff();
    }


    public function read_staff(){
        try{
            return view('staff.index', ['staffs' => $this->staff->read_all()->get()]);
        }catch (GeneralException $ge){
            return back()->withErrors($ge->getMessage());
        } catch (Exception $e){
            return back()->withErrors(Lang::get('messages.internal_error'));
        }
    }


    public function create_staff(){
        return view('staff.create',['staff' => $this->staff]);
    }

    public function store(Request $request){
        try{
            $this->staff->name = $request->input('name');
            $this->staff->document = $request->input('document');
            $this->staff->uf = $request->input('uf');
            $this->staff->create($this->staff);
            return redirect('/staff/read_staff');
        }catch (ValidationException $ve){
            return back()->withErrors($ve->getMessage())->withInput();
        }catch (Exception $e){
            return back()->withErrors($e->getMessage());
        }
    }


    public function update_staff(Request $request){
        try{
            $id = base64_decode($request->input('id'));
            return view('staff.update', ['staff' => $this->staff->read($id)]);
        }catch (GeneralException $ge){
            return back()->withErrors($ge->getMessage());
        }catch (Exception $e){
            return back()->withErrors(Lang::get('messages.internal_error'));
        }
    }

    public function update(Request $request){
        try{
            $this->staff->id = $request->input('id');
            $this->staff->name = $request->input('name');
            $this->staff->document = $request->input('document');
            $this->staff->uf = $request->input('uf');
            $this->staff->edit($this->staff);
            return redirect('/staff/read_staff');
        }catch (ValidationException $ve){
            return back()->withErrors($ve->getMessage());
        }catch (\Exception $e){
            return back()->withErrors($e->getMessage());
        }
    }

    public function delete_staff(Request $request){
        try{
            $staff_id = base64_decode($request->input('id'));
            if ($this->staff->remove($staff_id)){
                return redirect('/staff/read_staff')->with('success',__('messages.success'));
            }
        }catch (GeneralException $ge){
            return back()->withErrors($ge->getMessage());
        }catch (Exception $e){
            return back()->withErrors(Lang::get('messages.internal_error'));
        }
    }
}
