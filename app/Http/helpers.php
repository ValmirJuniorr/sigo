<?php

use App\Models\Module;
use App\Models\SubModule;


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
            return $sub_module->read_sub_modules_by_module_and_user(5);
        }catch(\Exception $e){
            return null;
        }
    }