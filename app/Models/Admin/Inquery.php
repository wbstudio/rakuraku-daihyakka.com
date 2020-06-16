<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Inquery extends Model
{
    //
        //for admin list0
        public function getInqueriesList($type=null)
        {
            $aList =$this::where("delete_flag",0)
            ->orderBy('created_at', 'desc')
            ->get();
            return $aList;
        }
        public function getInquery($id=null){
            $data =$this::where("id",$id)->where("delete_flag",0)->get();
            return $data;
        }
    
        public function getValirule(){
            $valirule = [
                            "resp_title"        =>"required",
                            "resp_text"        =>"required",
                        ];
            return $valirule;
        }
    
}
