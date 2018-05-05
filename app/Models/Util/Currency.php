<?php
/**
 * Created by PhpStorm.
 * User: mvdkpj01
 * Date: 2/20/18
 * Time: 10:03 PM
 */

namespace App\Models\Util;


class Currency
{

    public static function currency_to_float($value){
        return floatval(str_replace(",",".",$value));
    }

}