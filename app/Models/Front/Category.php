<?php

namespace App\Models\Front;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    public function getCategoriesList($type=null)
    {

        // if($type != null) $query->where('type', $type);
        $sub_category = array();
        $aList        = array();

        $data =$this::where("delete_flag",0)->get();

        //sub_categoryをmain_idごとにまとめる
        foreach($data as $index => $value){
            if($value["main_id"] != null){
                $sub_category[$value["main_id"]][] = $value;
            }
        }
        //main_categoryにsub_categoryを入れる
        foreach($data as $index => $value){
            if($value["main_id"] == null && isset($sub_category[$value["id"]])){
                $value["sub_categories"] = $sub_category[$value["id"]];
            }
            $aList[$index] = $value;
        }


        return $aList;
    }

}
