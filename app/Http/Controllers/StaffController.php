<?php

namespace App\Http\Controllers;

use App\Exceptions\Util\ValidationException;
use App\Models\Staff;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    public function read_staff(){
        try{
            $staff = new Staff();
            $staffs = $staff->read_all()->get();
            return view('staff.index', ['staffs' => $staffs]);
        }catch (GeneralException $ge){
            return back()->withErrors($ge->getMessage());
        } catch (Exception $e){
            return back()->withErrors("Erro Interno");
        }
    }


    public function create_staff(){
        return view('staff.create');
    }

    public function store(Request $request){
        try{
            $staff = new Staff();
            $staff->name = $request->input('name');
            $staff->document = $request->input('document');
            $staff->uf = $request->input('uf');
            $staff->create($staff);
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
            $staff = new Staff();
            $staff_show = $staff->read($id);
            return view('staff.update', ['staff' => $staff_show]);
        }catch (GeneralException $ge){
            return back()->withErrors($ge->getMessage());
        }catch (Exception $e){
            return back()->withErrors("Erro Interno");
        }
    }

    public function update(Request $request){
        try{
            $staff = new Staff();
            $staff->id = $request->input('id');
            $staff->name = $request->input('name');
            $staff->document = $request->input('document');
            $staff->uf = $request->input('uf');
            $staff->edit($staff);
            return redirect('/staff/read_staff');
        }catch (ValidationException $ve){
            return back()->withErrors($ve->getMessage());
        }catch (\Exception $e){
            return back()->withErrors($e->getMessage());
        }
    }

    public function delete_staff(Request $request){
        try{
            $staff = new Staff();
            $staff_id = base64_decode($request->input('id'));
            if ($staff->remove($staff_id)){
                return redirect('/staff/read_staff')->with('success',__('messages.success'));
            }
        }catch (GeneralException $ge){
            return back()->withErrors($ge->getMessage());
        }catch (Exception $e){
            return back()->withErrors("Erro Interno");
        }
    }
}
