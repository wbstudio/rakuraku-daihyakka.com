<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //for admin list
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


    //for admin updata
    public function getCategoryById($id=null)
    {
        //data select
        $data =$this::where("id",$id)
                      ->where("delete_flag",0)
                      ->get();

        $category = $data[0];
        //表示形式をviewに合わせる
        $releaseAtval = explode(" ",$category["release_at"]);
        $YMDval       = explode("-",$releaseAtval[0]);
        $HMSval       = explode(":",$releaseAtval[1]);
        $category["disp_release_YMD"] = $YMDval[0]."/".$YMDval[1]."/".$YMDval[2];
        $category["disp_release_H"] = $HMSval[0];
        $category["disp_release_m"] = $HMSval[1];
        

        return $category;
    }

    public function getValirule(){
        $valirule = [
                        "name"        =>"required",
                        "release_day" =>"required"
                    ];
        return $valirule;
    }

    public function getPureCategoriesList($type=null)
    {
        $aList =$this::where("delete_flag",0)->get();
        return $aList;
    }

}
