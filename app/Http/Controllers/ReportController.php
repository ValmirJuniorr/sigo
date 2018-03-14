<?php

namespace App\Http\Controllers;

use App\Models\Expensive\ExpenseCategory;
use App\Models\Staff;
use App\Models\TransactionStatus;
use Illuminate\Http\Request;

class ReportController extends Controller
{


    private $staff;
    private $transactionStatus;
    private $expenseCategory;


    /**
     * ReportController constructor.
     */
    public function __construct()
    {
        $this->staff = new Staff();
        $this->transactionStatus = new TransactionStatus();
        $this->expenseCategory = new ExpenseCategory();
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

}
