<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


use App\Model\Procedure;
use App\Model\Transaction;
use App\Models\Customer;
use App\Models\Expensive\Expense;
use App\Models\Expensive\ExpenseCategory;
use App\Models\Staff;
use App\Models\StaffCategory;
use App\Models\User;

Route::get('/', 'UserController@index');

Route::get('/recover', 'UserController@recover');

Route::post('/login/auth', 'UserController@do_login');

Route::get('/logout', 'UserController@logout');

Route::post('/rpc/v1/do_login_WS', 'WsUserController@do_login_WS');


Route::group(['middleware' => ['check_login']], function () {


    Route::get('/module', 'ModuleController@index');
    Route::get('/profile', 'ProfileController@index');
    Route::get('/dashboard', 'DashboardController@index');
    Route::get('/module/set_module_section', 'ModuleController@set_module_section');

    Route::group(['middleware' => ['check_permission']], function () {

        /* Usuários */

        Route::get('/user/read_user',
            [
                'uses' => 'UserController@read_user',
                'role' => User::READ_USER
            ]
        );

        Route::get('/user/create_user',
            [
                'uses' => 'UserController@create_user',
                'role' => User::STORE_USER
            ]
        );

        Route::post('/user/create_user/store',
            [
                'uses' => 'UserController@store',
                'role' => User::STORE_USER
            ]
        );

        Route::get('/user/delete_user',
            [
                'uses' => 'UserController@delete_user',
                'role' => User::DELETE_USER
            ]
        );

        Route::get('/user/update_user',
            [
                'uses' => 'UserController@update_user',
                'role' => User::UPDATE_USER
            ]
        );
        Route::post('/user/update',
            [
                'uses' => 'UserController@update',
                'role' => User::UPDATE_USER
            ]
        );

        /* CLientes */

        Route::get('/customer/read_customer',
            [
                'uses' => 'CustomerController@read_customer',
                'role' => Customer::READ_CUSTOMER
            ]
        );

        Route::get('/customer/create_customer',
            [
                'uses' => 'CustomerController@create_customer',
                'role' => Customer::STORE_CUSTOMER
            ]
        );

        Route::post('/customer/store',
            [
                'uses' => 'CustomerController@store',
                'role' => Customer::STORE_CUSTOMER
            ]
        );

        Route::get('/customer/delete_customer',
            [
                'uses' => 'CustomerController@delete_customer',
                'role' => Customer::DELETE_CUSTOMER
            ]
        );

        Route::get('/customer/update_customer',
            [
                'uses' => 'CustomerController@update_customer',
                'role' => Customer::UPDATE_CUSTOMER
            ]
        );

        Route::post('/customer/update',
            [
                'uses' => 'CustomerController@update',
                'role' => Customer::UPDATE_CUSTOMER
            ]
        );

        /* Procedimentos */

        Route::get('/procedure/read_procedure',
            [
                'uses' => 'ProcedureController@read_procedure',
                'role' => Procedure::READ_PROCEDURE
            ]
        );

        Route::get('/procedure/create_procedure',
            [
                'uses' => 'ProcedureController@create_procedure',
                'role' => Procedure::STORE_PROCEDURE
            ]
        );

        Route::post('/procedure/store',
            [
                'uses' => 'ProcedureController@store',
                'role' => Procedure::STORE_PROCEDURE
            ]
        );

        Route::get('/procedure/delete_procedure',
            [
                'uses' => 'ProcedureController@delete_procedure',
                'role' => Procedure::DELETE_PROCEDURE
            ]
        );

        Route::get('/procedure/update_procedure',
            [
                'uses' => 'ProcedureController@show_procedure',
                'role' => Procedure::UPDATE_PROCEDURE
            ]
        );

        Route::post('/procedure/update',
            ['uses' => 'ProcedureController@edit_procedure',
                'role' => Procedure::UPDATE_PROCEDURE
            ]);

        Route::post('/groupquestion/store',
            ['uses' => 'GroupQuestionController@store',
                'role' => Procedure::STORE_PROCEDURE
            ]);

        Route::post('/groupquestion/edit',
            ['uses' => 'GroupQuestionController@edit',
                'role' => Procedure::UPDATE_PROCEDURE
            ]);

        Route::get('/groupquestion/remove',
            ['uses' => 'GroupQuestionController@remove',
                'role' => Procedure::DELETE_PROCEDURE
            ]);

        Route::get('/groupquestion/change_priority',
            ['uses' => 'GroupQuestionController@change_prioriry',
                'role' => Procedure::STORE_PROCEDURE
            ]);

        Route::post('/question/store',
            ['uses' => 'QuestionController@store',
                'role' => Procedure::STORE_PROCEDURE
            ]);

        Route::post('/question/edit',
            ['uses' => 'QuestionController@edit',
                'role' => Procedure::UPDATE_PROCEDURE
            ]);

        Route::get('/question/remove',
            ['uses' => 'QuestionController@remove',
                'role' => Procedure::DELETE_PROCEDURE
            ]);

        Route::get('/question/change_priority',
            ['uses' => 'QuestionController@change_prioriry',
                'role' => Procedure::STORE_PROCEDURE
            ]);

        /* Despesas */

        Route::get('/expense/index',
            [
                'uses' => 'ExpenseController@index',
                'role' => Expense::READ_EXPENSE
            ]
        );

        Route::get('/expense/create_expense',
            [
                'uses' => 'ExpenseController@create_expense',
                'role' => Expense::STORE_EXPENSE
            ]
        );

        Route::get('/expense/show_expense',
            [
                'uses' => 'ExpenseController@show_expense',
                'role' => Expense::READ_EXPENSE
            ]
        );

        Route::get('/expense/remove_expense',
            [
                'uses' => 'ExpenseController@remove_expense',
                'role' => Expense::DELETE_EXPENSE
            ]
        );

        Route::post('/expense/store_expense',
            [
                'uses' => 'ExpenseController@store_expense',
                'role' => Expense::STORE_EXPENSE
            ]
        );

        Route::post('/expense/edit_expense',
            [
                'uses' => 'ExpenseController@edit_expense',
                'role' => Expense::UPDATE_EXPENSE
            ]
        );

        Route::get('/expense/index_routine_expenses',
            [
                'uses' => 'ExpenseController@index_routine_expenses',
                'role' => Expense::READ_EXPENSE
            ]
        );

        Route::get('/expense/show_routine_expense',
            [
                'uses' => 'ExpenseController@show_routine_expense',
                'role' => Expense::READ_EXPENSE
            ]
        );

        Route::post('/expense/update_routine_expense',
            [
                'uses' => 'ExpenseController@update_routine_expense',
                'role' => Expense::UPDATE_EXPENSE
            ]
        );

        Route::get('/expense/remove_routine_expense',
            [
                'uses' => 'ExpenseController@remove_routine_expense',
                'role' => Expense::DELETE_EXPENSE
            ]
        );

        /* Transações */

        Route::get('/transaction/read_transaction',
            [
                'uses' => 'TransactionController@read_transaction',
                'role' => Transaction::READ_TRANSACTION
            ]
        );

        Route::get('/transaction/create_transaction',
            [
                'uses' => 'TransactionController@create_transaction',
                'role' => Transaction::STORE_TRANSACTION
            ]
        );

        Route::post('/transaction/store_transaction',
            [
                'uses' => 'TransactionController@store',
                'role' => Transaction::STORE_TRANSACTION
            ]
        );

        Route::get('/transaction/show',
            [
                'uses' => 'TransactionController@show',
                'role' => Transaction::STORE_TRANSACTION
            ]
        );

        Route::get('/transaction/showTransaction',
            [
                'uses' => 'TransactionController@show_transaction',
                'role' => Transaction::STORE_TRANSACTION
            ]
        );

        Route::get('/transaction/delete_transaction',
            [
                'uses' => 'TransactionController@delete_transaction',
                'role' => Transaction::DELETE_TRANSACTION
            ]
        );

        Route::get('/transaction/update_transaction',
            [
                'uses' => 'TransactionController@update_transaction',
                'role' => Transaction::UPDATE_TRANSACTION
            ]
        );

        Route::post('/transaction/update',
            [
                'uses' => 'TransactionController@update',
                'role' => Transaction::UPDATE_TRANSACTION
            ]
        );


        Route::get('/transaction/print_receipt_page',
            [
                'uses' => 'TransactionController@page_transaction_receipt_print',
                'role' => Transaction::READ_TRANSACTION
            ]
        );


        /*Staffs */

        Route::get('/staff/read_staff',
            [
                'uses' => 'StaffController@read_staff',
                'role' => Staff::READ_STAFF
            ]
        );

        Route::get('/staff/create_staff',
            [
                'uses' => 'StaffController@create_staff',
                'role' => Staff::STORE_STAFF
            ]
        );

        Route::post('/staff/store',
            [
                'uses' => 'StaffController@store',
                'role' => Staff::STORE_STAFF
            ]
        );

        Route::get('/staff/delete_staff',
            [
                'uses' => 'StaffController@delete_staff',
                'role' => Staff::DELETE_STAFF
            ]
        );

        Route::get('/staff/update_staff',
            [
                'uses' => 'StaffController@update_staff',
                'role' => Staff::UPDATE_STAFF
            ]
        );

        Route::post('/staff/update',
            [
                'uses' => 'StaffController@update',
                'role' => Staff::UPDATE_STAFF
            ]
        );


        /* Staff category*/
        Route::get('/staff_category/read_staff_category',
            [
                'uses' => 'StaffCategoryController@read_staff_category',
                'role' => StaffCategory::READ_STAFF_CATEGORY
            ]
        );

        Route::get('/staff_category/create_staff_category',
            [
                'uses' => 'StaffCategoryController@create_staff_category',
                'role' => StaffCategory::STORE_STAFF_CATEGORY
            ]
        );

        Route::post('/staff_category/store',
            [
                'uses' => 'StaffCategoryController@store',
                'role' => StaffCategory::STORE_STAFF_CATEGORY
            ]
        );

        Route::get('/staff_category/delete_staff_category',
            [
                'uses' => 'StaffCategoryController@delete_staff_category',
                'role' => StaffCategory::DELETE_STAFF_CATEGORY
            ]
        );

        Route::get('/staff_category/update_staff_category',
            [
                'uses' => 'StaffCategoryController@update_staff_category',
                'role' => StaffCategory::UPDATE_STAFF_CATEGORY
            ]
        );

        Route::post('/staff_category/update',
            [
                'uses' => 'StaffCategoryController@update',
                'role' => StaffCategory::UPDATE_STAFF_CATEGORY
            ]
        );

        /** Expense Category*/

        Route::get('/expense_category/read_expense_category',
            [
                'uses' => 'ExpenseCategoryController@read_expense_category',
                'role' => ExpenseCategory::READ_EXPENSE_CATEGORY
            ]
        );

        Route::get('/expense_category/create_expense_category',
            [
                'uses' => 'ExpenseCategoryController@create_expense_category',
                'role' => ExpenseCategory::STORE_EXPENSE_CATEGORY
            ]
        );

        Route::post('/expense_category/store',
            [
                'uses' => 'ExpenseCategoryController@store',
                'role' => ExpenseCategory::STORE_EXPENSE_CATEGORY
            ]
        );

        Route::get('/expense_category/delete_expense_category',
            [
                'uses' => 'ExpenseCategoryController@delete_expense_category',
                'role' => ExpenseCategory::DELETE_EXPENSE_CATEGORY
            ]
        );

        Route::get('/expense_category/update_expense_category',
            [
                'uses' => 'ExpenseCategoryController@update_expense_category',
                'role' => ExpenseCategory::UPDATE_EXPENSE_CATEGORY
            ]
        );

        Route::post('/expense_category/update',
            [
                'uses' => 'ExpenseCategoryController@update',
                'role' => ExpenseCategory::UPDATE_EXPENSE_CATEGORY
            ]
        );

        /* Telas de Resumo de Receitas e despesas */


        /**
         * Rota para tela que apresenta o resumo das receitas
         */
        Route::get('/transactions/report/resume_transactions',
            [
                'uses' => 'TransactionController@transactions_report',
                'role' => Transaction::RESUME_TRANSACTIONS_REPORT
            ]
        );

        Route::get('/report/result_resume_transactions_report',
            [
                'uses' => 'TransactionController@result_resume_transactions_report',
                'role' => Transaction::RESUME_TRANSACTIONS_REPORT
            ]

        );


        /**
         * Rota para a interface do resumo de despesas
         */
        Route::get('/expense/report/resume_expense',
            [
                'uses' => 'ExpenseController@expenses_report',
                'role' => Expense::RESUME_EXPENSES_REPORT
            ]
        );

        /**
         * Rota utilizada para requisição AJAX da tela de resumo de despesas
         */
        Route::get('/expense/report/result_resume_expense',
            [
                'uses' => 'ExpenseController@result_expenses_report',
                'role' => Expense::RESUME_EXPENSES_REPORT
            ]
        );

    });

});

Route::get('/expense/report_expense_by_category', 'ExpenseController@report_expense_by_cateogry');

Route::get('/expense/last_expenses', 'ExpenseController@last_expenses');

Route::get('/expense/expense_by_day', 'ExpenseController@expense_by_day');

Route::get('/expense/expense_by_day_with_dates', 'ExpenseController@expense_by_day_with_dates');

Route::get('/expense/expense_by_category_with_dates', 'ExpenseController@expense_by_category_with_dates');

Route::get('/transaction/read_group_transaction_by_category', 'TransactionController@read_group_transaction_by_category');

Route::get('/transaction/resume_data_to_stack_collumn', 'TransactionController@resume_data_to_stack_collumn');

Route::get('/report/transaction/dashboard/transaction_by_day','TransactionController@dashboard_report_total_transaction_by_day');

Route::get('/report/transaction/dashboard/transaction_by_category','TransactionController@dashboard_report_trasaction_by_category');

Route::get('/report/transaction/dashboard/transaction_stack_collumn','TransactionController@dashboard_report_trasaction_stack_collumn');

Route::get('/report/expense_transactions', 'ReportController@resume_expense_transactions');

Route::get('/report/report_line_chart_expenses_transactions', 'ReportController@report_line_chart_expenses_transactions');

Route::get('/report/resume_result_expense_transaction', 'ReportController@resume_result_expense_transaction');

Route::get('/procedure/get_procedure_by_category', 'ProcedureController@get_procedure_by_category');


Route::get('/group_questions/read_group_questions','GroupQuestionController@readAllGroupQuestionsWithQuestions');

Route::get('testeApp', function (){

    $group = new \App\Models\GroupQuestion();

    $g = $group::find(1);

    return $g::with('questions')->get();

});