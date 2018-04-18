<?php

namespace App\Http\Controllers;

use App\Model\Procedure;
use App\Model\Transaction;
use App\Models\Customer;
use App\Models\TransactionStatus;
use App\Models\Util\Calendar;
use App\Models\Staff;
use App\Models\StaffCategory;
use App\Models\Util\Constants;
use Illuminate\Http\Request;
use App\Exceptions\Util\ValidationException;

class TransactionController extends Controller
{


    private $transaction;
    private $category;
    private $staff;
    private $customer;
    private $procedure;


    /**
     * TransactionController constructor.
     */
    public function __construct()
    {
        $this->transaction = new Transaction();
        $this->category = new StaffCategory();
        $this->staff = new Staff();
        $this->customer = new Customer();
        $this->transactionStatus = new TransactionStatus();
        $this->procedure = new Procedure();
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
        try {
            $transaction = new Transaction();
            $customer_id = $request->input('customer_id');
            $transaction->staff_id = $request->input('staff_id');
            $transaction->procedure_id = $request->input('procedure_id');
            $transaction->description = $request->input('description');
            $transaction->customer_id = $customer_id;
            $transaction->create($transaction);
            return redirect()->action('TransactionController@show', ['id' => base64_encode($customer_id)]);
        } catch (ValidationException $ve){
            return back()->withErrors($ve->getMessage())->withInput();
        }catch (Exception $e){
            return back()->withErrors($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaction $transaction
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
            $transactionStatuses = $this->transactionStatus->read_all()->get();
            return view('transaction.show ',
                [
                    'transactionOfCustomer' => $transactionInCustomer,
                    'categories' => $category_all,
                    'staffs' => $staff_all,
                    'customer' => $customer,
                    'transactionStatuses' =>$transactionStatuses
                ]
            );
        } catch (GeneralException $ge) {
            return back()->withErrors($ge->getMessage());
        } catch (Exception $e) {
            return back()->withErrors("Erro Interno");
        }
    }


    public function show_transaction(Request $request)
    {
        try {
            $transaction_id = $request->input('id');
            return  $this->transaction->read($transaction_id);
        } catch (\Exception $e) {
            return back()->withErrors($e->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaction $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        try{
            $this->transaction->id = $request->input('code');
            $this->transaction->staff_id = $request->input('staff_transaction');
            $this->transaction->cost_price = $request->input('cost_price');
            $this->transaction->price = $request->input('value_procedure');
            $this->transaction->paid = $request->input('situation_transaction');
            $this->transaction->transaction_status_id = $request->input('status_transaction');
            $this->transaction->description = $request->input('description');
            $this->transaction->edit($this->transaction);
            return redirect()->action('TransactionController@show', ['id' => base64_encode(1)]);
        } catch (ValidationException $ve){
            return back()->withErrors($ve->getMessage())->withInput();
        }catch (Exception $e){
            return back()->withErrors($e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Models\Transaction $transaction
     * @return \Illuminate\Http\Response
     */
    public function update_transaction(Request $request, Transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaction $transaction
     * @return \Illuminate\Http\Response
     */
    public function delete_transaction(Request $request)
    {
        try {
            $expense_id = $request->input('id');
            if ($this->transaction->remove($expense_id)) {
                return back()->with(Constants::SUCCESS, __('messages.success'));
            }
        } catch (\Exception $e) {
            return back()->withErrors($e->getMessage());
        }
    }


    public function page_transaction_receipt_print(Request $request){

        $id = $request->input('id');

        $transaction = $this->transaction->read_one($id);

        return view('transaction.page_transaction_receipt')->with(array('transaction' => $transaction));
    }

    public function read_group_transaction_by_category(Request $request)
    {
        $start_date = Calendar::invert_date_to_yyyy_mm_dd($request->input('start_date'));
        $end_date = Calendar::invert_date_to_yyyy_mm_dd($request->input('end_date'));
        $status_id = $request->input('status_id');
        $staff_id = $request->input('staff_id');

        return $this->transaction->read_group_transaction_by_cateogry($start_date, $end_date, null, $status_id, $staff_id);
    }

    public function resume_data_to_stack_collumn(Request $request)
    {
        $start_date = Calendar::invert_date_to_yyyy_mm_dd($request->input('start_date'));
        $end_date = Calendar::invert_date_to_yyyy_mm_dd($request->input('end_date'));
        $status_id = $request->input('status_id');
        $staff_id = $request->input('staff_id');

        return $this->transaction->resume_data_to_stack_collumn($start_date, $end_date, null, $status_id, $staff_id);
    }

    public function transactions_report(Request $request)
    {

        $staffs = $this->staff->read_all()->get();
        $transactionStatuses = $this->transactionStatus->read_all()->get();
        $procedures = $this->procedure->read_all()->get();

        return view('reports.transactions_report')->with(array(
            'staffs' => $staffs,
            'transactionStatuses' => $transactionStatuses,
            'procedures' => $procedures
        ));
    }

    public function result_resume_transactions_report(Request $request)
    {
        $start_date = Calendar::invert_date_to_yyyy_mm_dd($request->input('start_date'));
        $end_date = Calendar::invert_date_to_yyyy_mm_dd($request->input('end_date'));
        $status_id = $request->input('status_id');
        $staff_id = $request->input('staff_id');
        $procedure_ids = $request->input('procedure_ids');
        return $this->transaction->resume_transactions_report($start_date, $end_date, $procedure_ids, $status_id, $staff_id);
    }

}
