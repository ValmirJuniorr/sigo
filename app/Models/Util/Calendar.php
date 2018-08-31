<?php
/**
 * Created by PhpStorm.
 * User: mvdkpj01
 * Date: 1/23/18
 * Time: 10:02 PM
 */

namespace App\Models\Util;


use Carbon\Carbon;

class Calendar
{

    public static function invert_date_to_yyyy_mm_dd($date){
        if(!empty($date))
            return Carbon::parse($date)->format('Y-m-d');
    }

    public static function invert_date_to_dd_mm_yyyy($date){
        if(!empty($date))
            return Carbon::parse($date)->format('d-m-Y');
    }


    public static function before_today($date){
        return $date < Carbon::now()->format('Y-m-d');
    }
}