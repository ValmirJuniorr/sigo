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



}
