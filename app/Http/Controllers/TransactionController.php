<?php

namespace App\Http\Controllers;

use App\Model\Procedure;
use App\Model\Transaction;
use App\Models\Customer;
use App\Models\Util\Calendar;
use App\Models\Staff;
use App\Models\StaffCategory;
use Illuminate\Http\Request;

class TransactionController extends Controller
{


    private $transaction;


    /**
     * TransactionController constructor.
     */
    public function __construct()
    {
        $this->transaction = new Transaction();

    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function read_transaction()
    {
        try {
            $customer = new Customer();
            $customers = $customer->read_all()->get();
            return view('transaction.index', ['customers' => $customers]);
        } catch (GeneralException $ge) {
            return back()->withErrors($ge->getMessage());
        } catch (Exception $e) {
            return back()->withErrors("Erro Interno");
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create_transaction()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Transaction $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        try {
            $transaction = new Transaction();
            $category = new StaffCategory();
            $staffs = new Staff();
            $procedure = new Procedure();
            $customer_id = base64_decode($request->input('id'));
            $category_all = $category->read_all()->get();
            $staff_all = $staffs->read_all()->get();
         //   $procedures = $procedure->read_all()->get();
            $transactionInCustomer = $transaction->read_of_customer($customer_id);
            return view('transaction.show ', ['transactionOfCustomer' => $transactionInCustomer,
                 'categories' => $category_all,'staffs' => $staff_all]);
        }catch (GeneralException $ge){
            return back()->withErrors($ge->getMessage());
        } catch (Exception $e) {
            return back()->withErrors("Erro Interno");
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Transaction $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Transaction $transaction
     * @return \Illuminate\Http\Response
     */
    public function update_transaction(Request $request, Transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Transaction $transaction
     * @return \Illuminate\Http\Response
     */
    public function delete_transaction(Transaction $transaction)
    {
        //
    }


    public function read_group_transaction_by_category(Request $request)
    {
        $start_date = Calendar::invert_date_to_yyyy_mm_dd($request->input('start_date'));
        $end_date = Calendar::invert_date_to_yyyy_mm_dd($request->input('end_date'));
        $status_id = $request->input('status_id');
        $staff_id = $request->input('staff_id');

        return $this->transaction->read_group_transaction_by_cateogry($start_date,$end_date,null,$status_id,$staff_id);
    }

    public function resume_data_to_stack_collumn(Request $request)
    {
        $start_date = Calendar::invert_date_to_yyyy_mm_dd($request->input('start_date'));
        $end_date = Calendar::invert_date_to_yyyy_mm_dd($request->input('end_date'));
        $status_id = $request->input('status_id');
        $staff_id = $request->input('staff_id');

        return $this->transaction->resume_data_to_stack_collumn($start_date,$end_date,null,$status_id,$staff_id);
    }

}
