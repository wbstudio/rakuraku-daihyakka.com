<?php

namespace App\Models\Front;

use Illuminate\Database\Eloquent\Model;

class Inquery extends Model
{
    //
    public function getValirule(){
        $valirule = [
                        "adress"=>"required",
                        "main_text" =>"required"
                    ];
        return $valirule;
    }

}
