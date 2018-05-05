<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ModuleController extends Controller
{


    public function index(){
        return view('module');
    }

    public function set_module_section(Request $request){
        $module_id = $request->input('id');
        $color = $request->input('color',session('module_color'));
        $request->session()->put('module_id', $module_id);
        $request->session()->put('module_color', $color);
        return view('dashboard');
    }

}
