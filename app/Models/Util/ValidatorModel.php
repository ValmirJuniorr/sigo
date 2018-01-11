<?php

namespace App\Models\Util;

use App\Exceptions\Util\ValidationException;
use Illuminate\Support\Facades\Validator;

class ValidatorModel {

    public static function validation($input,$rules,$attributes,$messages = array()){
        $validator = Validator::make($input,$rules,$messages);
        $validator->setAttributeNames($attributes);
        if ($validator->fails()) {
            throw new ValidationException($validator->errors()->first());
        }else{
            return true;
        }
    }
}
