<?php

namespace App\Http\Controllers;

use App\Exceptions\Util\ValidationException;
use App\Model\Procedure;
use App\Models\Customer;
use App\Models\StaffCategory;
use Illuminate\Http\Request;

class ProcedureController extends Controller
{

    private $procedure;
    private $staff_category;

    /**
     * ProcedureController constructor.
     */
    public function __construct()
    {
        $this->procedure = new Procedure();
        $this->staff_category = new StaffCategory();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function read_procedure()
    {
        try{
            $procedures = $this->procedure->read_all()->get();
            return view('procedure.index', ['procedures' => $procedures]);
        }catch (GeneralException $ge){
            return back()->withErrors($ge->getMessage());
        } catch (Exception $e){
            return back()->withErrors("Erro Interno");
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create_procedure()
    {
        $staff_categories = $this->staff_category->read_all();
        return view('procedure.create',['staff_categories' => $staff_categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            $this->procedure->name = $request->input('name');
            $this->procedure->price = $request->input('price');
            $this->procedure->procedure_time = $request->input('timer');
            $this->procedure->staff_category_id = $request->input('staff_category_id');
            if($this->procedure->create($this->procedure)){
                return redirect('/procedure/read_procedure')->with('success',__('messages.success'));
            }
        }catch (ValidationException $e){
            return back()->withErrors($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Procedure  $procedure
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Procedure  $procedure
     * @return \Illuminate\Http\Response
     */
    public function update_procedure(Request $request)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Procedure  $procedure
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Procedure  $procedure
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        //
    }
}
