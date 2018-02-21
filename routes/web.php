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
use App\Models\User;

Route::get('/','UserController@index');

Route::get('/recover', 'UserController@recover');

Route::post('/login/auth','UserController@do_login');

Route::post('/rpc/v1/do_login_WS','WsUserController@do_login_WS');


Route::group(['middleware' => ['check_login']], function () {


    Route::get('/module', 'ModuleController@index');
    Route::get('/profile', 'ProfileController@index');
    Route::get('/dashboard', 'DashboardController@index');
    Route::get('/module/set_module_section','ModuleController@set_module_section');

    Route::group(['middleware' => ['check_permission']], function (){

        /* Usuários */

        Route::get('/user/read_user', [
            'uses' => 'UserController@read_user',
            'role' => User::READ_USER
        ]);

        Route::get('/user/create_user',
            ['uses' =>'UserController@create_user',
            'role' => User::STORE_USER
            ]);

        Route::post('/user/create_user/store',
            ['uses' => 'UserController@store',
            'role' => User::STORE_USER
            ]);

        Route::get('/user/delete_user',
            ['uses' => 'UserController@delete_user',
             'role' => User::DELETE_USER
            ]);

        Route::get('/user/update_user',
            ['uses' => 'UserController@update_user',
             'role' => User::UPDATE_USER
            ]);
        Route::post('/user/update',
            ['uses' => 'UserController@update',
             'role' => User::UPDATE_USER
            ]);

        /* CLientes */

        Route::get('/customer/read_customer', [
            'uses' => 'CustomerController@read_customer',
            'role' => Customer::READ_CUSTOMER
        ]);

        Route::get('/customer/create_customer',
            ['uses' =>'CustomerController@create_customer',
                'role' => Customer::STORE_CUSTOMER
            ]);

        Route::post('/customer/store',
            ['uses' =>'CustomerController@store',
                'role' => Customer::STORE_CUSTOMER
            ]);

        Route::get('/customer/delete_customer',
            ['uses' => 'CustomerController@delete_customer',
                'role' => Customer::DELETE_CUSTOMER
            ]);

        Route::get('/customer/update_customer',
            ['uses' => 'CustomerController@update_customer',
                'role' => Customer::UPDATE_CUSTOMER
            ]);

        Route::post('/customer/update',
            ['uses' => 'CustomerController@update',
                'role' => Customer::UPDATE_CUSTOMER
            ]);

        /* Procedimentos */

        Route::get('/procedure/read_procedure', [
            'uses' => 'ProcedureController@read_procedure',
            'role' => Procedure::READ_PROCEDURE
        ]);

        Route::get('/procedure/create_procedure',
            ['uses' =>'ProcedureController@create_procedure',
                'role' => Procedure::STORE_PROCEDURE
            ]);

        Route::post('/procedure/store',
            ['uses' =>'ProcedureController@store',
                'role' => Procedure::STORE_PROCEDURE
            ]);

        Route::get('/procedure/delete_procedure',
            ['uses' => 'ProcedureController@delete_procedure',
                'role' => Procedure::DELETE_PROCEDURE
            ]);

        Route::get('/procedure/update_procedure',
            ['uses' => 'ProcedureController@show_procedure',
                'role' => Procedure::UPDATE_PROCEDURE
            ]);

        Route::post('/procedure/update',
            ['uses' => 'ProcedureController@edit_procedure',
                'role' => Procedure::UPDATE_PROCEDURE
            ]);


        Route::get('/expense/index',
            ['uses' => 'ExpenseController@index',
                'role' => Expense::READ_EXPENSE]);

        Route::get('/expense/create_expense',
            ['uses' => 'ExpenseController@create_expense',
                'role' => Expense::STORE_EXPENSE
            ]);

        Route::get('/expense/show_expense',[
            'uses' => 'ExpenseController@show_expense',
            'role' => Expense::UPDATE_EXPENSE]);

        Route::get('/expense/remove_expense',[
            'uses' => 'ExpenseController@remove_expense',
            'role' => Expense::DELETE_EXPENSE]);

        Route::post('/expense/store_expense',[
            'uses' => 'ExpenseController@store_expense',
            'role' => Expense::STORE_EXPENSE]);

        Route::post('/expense/edit_expense',[
            'uses' => 'ExpenseController@edit_expense',
            'role' => Expense::UPDATE_EXPENSE]);


        /* Transações */

        Route::get('/transaction/read_transaction', [
            'uses' => 'TransactionController@read_transaction',
            'role' => Transaction::READ_TRANSACTION
        ]);

        Route::get('/transaction/create_transaction',
            ['uses' =>'TransactionController@create_transaction',
                'role' => Transaction::STORE_TRANSACTION
            ]);

        Route::post('/transaction/transaction',
            ['uses' =>'TransactionController@transaction',
                'role' => Transaction::STORE_TRANSACTION
            ]);

        Route::get('/transaction/delete_transaction',
            ['uses' => 'TransactionController@delete_transaction',
                'role' => Transaction::DELETE_TRANSACTION
            ]);

        Route::get('/transaction/update_transaction',
            ['uses' => 'TransactionController@update_transaction',
                'role' => Transaction::UPDATE_TRANSACTION
            ]);

        Route::post('/transaction/update',
            ['uses' => 'TransactionController@update',
                'role' => Transaction::UPDATE_TRANSACTION
            ]);

    });

});


Route::get('/expense/report_expense_by_cateogry', 'ExpenseController@report_expense_by_cateogry');

Route::get('/expense/last_expenses', 'ExpenseController@last_expenses');

Route::get('/expense/expense_by_day', 'ExpenseController@expense_by_day');

Route::get('teste',function (){

    $transaction = new Transaction();
    $customer = new Customer();

    return $customer->read_customer_by_transaction(1);

    $t = $transaction->read(1);

    return $t->transactionStatus;


});


/* Staff */

Route::get('/staff/read_staff'   , 'StaffController@read_staff');

Route::get('/staff/create_staff' , 'StaffController@create_staff');

Route::post('/staff/store'       , 'StaffController@store');

Route::get('/staff/delete_staff' , 'StaffController@delete_staff');

Route::get('/staff/update_staff' , 'StaffController@update_staff');

Route::post('/staff/update'      , 'StaffController@update');



Route::get('/staff_category/read_staff_category'   , 'StaffCategoryController@read_staff_category');

Route::get('/staff_category/create_staff_category' , 'StaffCategoryController@create_staff_category');

Route::post('/staff_category/store'                , 'StaffCategoryController@store');

Route::get('/staff_category/delete_staff_category' , 'StaffCategoryController@delete_staff_category');

Route::get('/staff_category/update_staff_category' , 'StaffCategoryController@update_staff_category');

Route::post('/staff_category/update'               , 'StaffCategoryController@update');


