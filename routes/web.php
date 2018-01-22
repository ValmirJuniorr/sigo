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


use App\Models\Customer;
use App\Models\User;

Route::get('/','UserController@index');

Route::get('/recover', 'UserController@recover');

Route::post('/login/auth','UserController@do_login');

Route::post('/rpc/v1/do_login_WS','WsUserController@do_login_WS');

Route::get('teste',function () {

   $customer = new Customer();

   return $customer->read_all()->get();

});



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

        Route::post('/customer/create_customer',
            ['uses' =>'CustomerController@create_customer',
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
    });

});



Route::get('/expense/index','ExpenseController@index');

Route::get('/expense/create_expense','ExpenseController@create_expense');

// Este grupo servirá para colocar as URL relacionadas ao aplicativo Android.
//Route::group([],function (){
//});




