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
    private $category;
    private $staff;
    private $customer;


    /**
     * TransactionController constructor.
     */
    public function __construct()
    {
        $this->transaction = new Transaction();
        $this->category = new StaffCategory();
        $this->staff = new Staff();
        $this->customer= new Customer();
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

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            $transaction = new Transaction();
            $customer_id = $request->input('customer_id');
            $transaction->staff_id = $request->input('staff_id');
            $transaction->procedure_id = $request->input('procedure_id');
            $transaction->description = $request->input('description');
            $transaction->customer_id = $customer_id;
            $transactionCreate = $transaction->create($transaction);
            return redirect()->action('TransactionController@show', ['id' => base64_encode($customer_id)]);
        }catch (ValidationException $ve){
            return back()->withErrors($ve->getMessage())->withInput();
        }catch (Exception $e){
            return back()->withErrors($e->getMessage());
        }
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
            $customer_id = base64_decode($request->input('id'));
            $category_all = $this->category->read_all()->get();
            $staff_all = $this->staff->read_all()->get();
            $transactionInCustomer = $this->transaction->read_of_customer($customer_id);
            $customer = $this->customer->read($customer_id);
            return view('transaction.show ', ['transactionOfCustomer' => $transactionInCustomer,
                 'categories' => $category_all,'staffs' => $staff_all,'customer' => $customer]);
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
