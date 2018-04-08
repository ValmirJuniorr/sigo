<?php

use App\Models\Module;
use App\Models\SubModule;
use App\Models\Util\Mask;


function show_modules(){
        try {
            $module = new Module();
            return $module->read_modules_by_user();
        }catch(\Exception $e){
            return null;
        }
    }

    function show_sub_modules(){
        try {
            $sub_module = new SubModule();
            return $sub_module->read_sub_modules_by_module_and_user(session('module_id'));
        }catch(\Exception $e){
            return null;
        }
    }


    function show_cpf_mask($value){
        return Mask::mask($value,'###.###.###-##');
    }

