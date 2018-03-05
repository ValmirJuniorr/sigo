<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportController extends Controller
{



    public function resume_expense_transactions(Request $request){


        return view('reports.expenses_transactions_report');
    }


}
