<?php

namespace App\Http\Controllers;

use App\Exceptions\User\AuthenticationException;
use App\Models\User;
use App\Models\Util\Constants   ;
use Illuminate\Http\Request;

class WsUserController extends Controller
{

    public function do_login_WS(Request $request){

        $user_result = array(Constants::RESULT => False, Constants::ERROR => "");

        try{
            $user = new User();
            $user->username = $request->input('username');
            $user->password = $request->input('password');
            $user_result = $user->do_login($user);
            if($user_result)
                $user_result[Constants::RESULT] = TRUE;
        }catch (AuthenticationException $e){
            $user_result[Constants::ERROR] = array(Constants::TYPE_ERROR => 1 , Constants::MESSAGE => $e->getMessage());
        }catch (Exception $e){
            $user_result[Constants::ERROR] = array(Constants::TYPE_ERROR => 500 , Constants::MESSAGE => $e->getMessage());
        }finally{
            return $user_result;
        }
    }

}
