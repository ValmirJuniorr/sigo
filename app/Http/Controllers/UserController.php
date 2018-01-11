<?php

namespace App\Http\Controllers;

use App\Exceptions\User\AuthenticationException;
use App\Exceptions\Util\ValidationException;
use App\Models\SubModule;
use App\Models\User;
use Illuminate\Http\Request;
use Exception;

class UserController extends Controller
{
    private $pag = 5;

    public function index(){
        return view('authentication.login');
    }

    public function recover(){
        return view('authentication.recover');
    }

    public function read_user(){
        try{
            $users = new User();
            $users = $users->read_all()->paginate($this->pag);
            return view('user.index', ['users' => $users]);

        }catch (GeneralException $ge){
            return back()->withErrors($ge->getMessage());
        } catch (Exception $e){
            return back()->withErrors("Erro Interno");
        }
    }

    public function create_user(){

        $sub_module_with_roles = new SubModule();
        $sub_module_with_roles = $sub_module_with_roles->read_sub_module_with_roles()->get();
        return view('user.create', ['submodules' => $sub_module_with_roles]);
    }

    public function store(Request $request){
        try{
            $user = new User();
            $user->name = $request->input('name');
            $user->username = $request->input('username');
            $user->email = $request->input('email');
            $user->password = bcrypt($request->input('password'));
            $roles = $request->input('roles');
            $user->create($user,['roles'=> $roles]);
            return redirect('/user/read_user');
        }catch (ValidationException $ve){
            return back()->withErrors($ve->getMessage());
        }catch (Exception $e){
            return back()->withErrors("Erro Interno");
        }
    }

    public function update(Request $request){
        try{
            $user = new User();
            $user->id = $request->input('id');
            $user->name = $request->input('name');
            $user->username = $request->input('username');
            $user->email = $request->input('email');
            $roles = $request->input('roles');
            $user->edit($user, ['roles' => $roles]);
            return redirect('/user/read_user');
        }catch (ValidationException $ve){
            return back()->withErrors($ve->getMessage());
        }catch (Exception $e){
            return back()->withErrors("Erro Interno");
        }
    }

    public function update_user(Request $request){
        try{
            $id = base64_decode($request->input('id'));
            $user = new User();
            $user = $user->read($id);
            $sub_module_with_roles = new SubModule();
            $sub_module_with_roles = $sub_module_with_roles->read_sub_module_with_roles()->get();
            return view('user.update', ['user' => $user, 'submodules' => $sub_module_with_roles]);
        }catch (GeneralException $ge){
            return back()->withErrors($ge->getMessage());
        }catch (Exception $e){
            return back()->withErrors("Erro Interno");
        }
    }


    public function delete_user(Request $request){
        try{
            $id = base64_decode($request->input('id'));
            $user = new User();
            $user->remove($id);
            return redirect('/user/read_user');
        }catch (GeneralException $ge){
            return back()->withErrors($ge->getMessage());
        }catch (Exception $e){
            return back()->withErrors("Erro Interno");
        }
    }


    public function do_login(Request $request){

        try{
            $user = new User();
            $user->username = $request->input('username');
            $user->password = $request->input('password');
            $user_result = $user->do_login($user);
            if($user_result)
                $request->session()->put('user_id', $user_result->id);
            return view('module');

        }catch (AuthenticationException $e){
            return back()->withErrors($e->getMessage());
        }catch (Exception $e){
            return back()->withErrors("Erro Interno");
        }

    }

    public function profile(){

    }

    public function logout(Request $request){
        $request->session()->flush();
        return redirect('/');
    }

    public function recovery(Request $request){

    }



}
