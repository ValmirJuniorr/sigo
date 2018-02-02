<?php

namespace App\Http\Controllers;

use App\Exceptions\Util\ValidationException;
use App\Models\Customer;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function read_customer(){
        try{
            $customer = new Customer();
            $customers = $customer->read_all()->get();
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
        try{
            $customer = new Customer();
            $customer->name = $request->input('name');
            $customer->address = $request->input('address');
            $customer->email = $request->input('email');
            $customer->cpf = $request->input('cpf');
            $customer->rg = $request->input('rg');
            $customer->phone = $request->input('phone');
            $customer->cell_phone = $request->input('cell_phone');
            $customer->birth_date = Carbon::parse($request->input('birth_date'))->format('Y-m-d');
            $customer->city = $request->input('city');
            $customer->neighborhood = $request->input('neighborhood');
            $customer->cep = $request->input('cep');
            $customer->uf = $request->input('uf');
            $customer->gender = $request->input('gender');
            $customer->create($customer);
            return redirect('/customer/read_customer');
        }catch (ValidationException $ve){
            return back()->withErrors($ve->getMessage())->withInput();
        }catch (Exception $e){
            return back()->withErrors($e->getMessage());
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
            $customer->address = $request->input('address');
            $customer->email = $request->input('email');
            $customer->cpf = $request->input('cpf');
            $customer->rg = $request->input('rg');
            $customer->phone = $request->input('phone');
            $customer->cell_phone = $request->input('cell_phone');
            $customer->birth_date = $request->input('birth_date');
            $customer->city = $request->input('city');
            $customer->neighborhood = $request->input('neighborhood');
            $customer->cep = $request->input('cep');
            $customer->uf = $request->input('uf');
            $customer->gender = $request->input('gender');
            $customer->edit($customer);
            return redirect('/customer/read_customer');
        }catch (ValidationException $ve){
            return back()->withErrors($ve->getMessage());
        }catch (\Exception $e){
            return back()->withErrors($e->getMessage());
        }
    }


    public function delete_customer(Request $request){
        try{
            $id = base64_decode($request->input('id'));
            $customer = new Customer();
            $customer->remove($id);
            return redirect('/customer/read_customer');
        }catch (GeneralException $ge){
            return back()->withErrors($ge->getMessage());
        }catch (Exception $e){
            return back()->withErrors("Erro Interno");
        }
    }
}
