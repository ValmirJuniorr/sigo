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

    public function update_customer(Request $request){
        try{
            $id = base64_decode($request->input('id'));

        }catch (GeneralException $ge){
            return back()->withErrors($ge->getMessage());
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
