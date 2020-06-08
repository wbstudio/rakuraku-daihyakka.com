<?php

namespace App\Define;

use Illuminate\Database\Eloquent\Model;

class Define extends Model
{
    //for admin list
    public function getSelectTimeList()
    {
        $timeselecter = array();
        for($i=0; $i < 24; $i++){
            $timeselecter["hour"][] = $i;
        }
        for($i=0; $i < 60; $i++){
            $timeselecter["munute"][] = $i;
        }
        return $timeselecter;
    }
}