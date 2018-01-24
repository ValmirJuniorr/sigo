<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    private $pag = 7;

    public function read_customer(){
        try{
            $customer = new Customer();
            $customers = $customer->read_all()->paginate($this->pag);
            return view('customer.index', ['customers' => $customers]);
        }catch (GeneralException $ge){
            return back()->withErrors($ge->getMessage());
        } catch (Exception $e){
            return back()->withErrors("Erro Interno");
        }
    }


    public function create_customer(){
        return view('customer.create');
    }

    public function store(Request $request){

        return $request;
        try{
            $customer = new Customer();
            $customer->name = $request->input('name');
            $customer->username = $request->input('username');
            $customer->email = $request->input('email');
            $customer->password = bcrypt($request->input('password'));
            $customer->create($customer);
            return redirect('/customer/read_customer');
        }catch (ValidationException $ve){
            return back()->withErrors($ve->getMessage());
        }catch (Exception $e){
            return back()->withErrors("Erro Interno");
        }
    }






    public function update_customer(Request $request){
        try{
            $id = base64_decode($request->input('id'));
            $customer = new Customer();
            $customer_show = $customer->read($id);
            return view('customer.update', ['customer' => $customer_show]);
        }catch (GeneralException $ge){
            return back()->withErrors($ge->getMessage());
        }catch (Exception $e){
            return back()->withErrors("Erro Interno");
        }
    }

    public function update(Request $request){
        try{
            $customer = new Customer();
            $customer->id = $request->input('id');
            $customer->name = $request->input('name');
            $customer->username = $request->input('username');
            $customer->email = $request->input('email');

            $customer->edit($customer);
            return redirect('/customer/read_customer');
        }catch (ValidationException $ve){
            return back()->withErrors($ve->getMessage());
        }catch (Exception $e){
            return back()->withErrors("Erro Interno");
        }
    }


    public function delete_customer(Request $request){
        try{
            $id = base64_decode($request->input('id'));

        }catch (GeneralException $ge){
            return back()->withErrors($ge->getMessage());
        }catch (Exception $e){
            return back()->withErrors("Erro Interno");
        }
    }
}
