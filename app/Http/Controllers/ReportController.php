<?php

namespace App\Http\Controllers;

use App\Model\Transaction;
use App\Models\Expensive\Expense;
use App\Models\Expensive\ExpenseCategory;
use App\Models\Staff;
use App\Models\TransactionStatus;
use App\Models\Util\Calendar;
use Illuminate\Http\Request;

class ReportController extends Controller
{


    private $staff;
    private $transactionStatus;
    private $expenseCategory;
    private $expense;
    private $transaction;

    /**
     * ReportController constructor.
     */
    public function __construct()
    {
        $this->staff = new Staff();
        $this->transactionStatus = new TransactionStatus();
        $this->expenseCategory = new ExpenseCategory();
        $this->expense = new Expense();
        $this->transaction = new Transaction();
    }

    public function resume_expense_transactions(Request $request){

        $staffs = $this->staff->read_all()->get();
        $transactionStatuses = $this->transactionStatus->read_all()->get();
        $expenseCategories = $this->expenseCategory->read_all()->get();


        return view('reports.expenses_transactions_report')->with(
            array(
                'staffs' => $staffs,
                'transactionStatuses' => $transactionStatuses,
                'expenseCategories' => $expenseCategories
            )
        );
    }


    public function report_line_chart_expenses_transactions(Request $request){
        $start_date = Calendar::invert_date_to_yyyy_mm_dd($request->input('start_date'));
        $end_date = Calendar::invert_date_to_yyyy_mm_dd($request->input('end_date'));
        $expense_category_ids = $request->input('expense_category_ids');

        $expenses = $this->expense->expense_by_day($start_date, $end_date,$expense_category_ids);

        $transactions_total = $this->transaction->transactions_by_day_total_value($start_date,$end_date);

        $transactions_parcial = $this->transaction->transactions_by_day_parcial_value($start_date,$end_date);

        return array('expenses' => $expenses, 'transactions_total' => $transactions_total, 'transactions_parcial' => $transactions_parcial);

    }


    public function resume_result_expense_transaction(Request $request){

        $start_date = Calendar::invert_date_to_yyyy_mm_dd($request->input('start_date'));
        $end_date = Calendar::invert_date_to_yyyy_mm_dd($request->input('end_date'));
        $status_id = $request->input('status_id');
        $staff_id = $request->input('staff_id');
        $expense_category_ids = $request->input('expense_category_ids');


        $contribuition_margin = $this->transaction->transactinos_operational_contribuition_margin($start_date,$end_date,null,$status_id,$staff_id);

        $income_result = $this->transaction->transactinos_operational_income($start_date,$end_date,null,$status_id,$staff_id);

        $expense_result = $this->expense->resume_expense_result($start_date,$end_date,$expense_category_ids);



        //$contribuition_margin = $operational_result - $expense_result;

        return array('operational_result' => $contribuition_margin - $expense_result,
                     'income_result' => $income_result,
                     'expense_result' => $expense_result,
                     'contribution_margin' => $contribuition_margin
                    );

    }






}
