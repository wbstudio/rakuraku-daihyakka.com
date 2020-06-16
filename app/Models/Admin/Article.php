<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{

    public function getArticlesList($type=null)
    {

        $columnList = [
            "ar.id as id",
            "name",
            "title",
            "ar.release_at",
        ];

        $aList =$this::from("articles as ar")
                    ->join("categories as ca","ar.category_id","=","ca.id")
                    ->where("ar.delete_flag",0)
                    ->orderby("ar.created_at","desc")
                    ->get($columnList);
        return $aList;
    }

    public function getValirule(){
        $valirule = [
                        "title"        =>"required",
                        "main"        =>"required",
                        "release_day" =>"required"
                    ];
        return $valirule;
    }

        //for admin updata
        public function getArticleById($id=null)
        {
            //data select
            $data =$this::where("id",$id)
                          ->where("delete_flag",0)
                          ->get();
    
            $article = $data[0];
            //表示形式をviewに合わせる
            $releaseAtval = explode(" ",$article["release_at"]);
            $YMDval       = explode("-",$releaseAtval[0]);
            $HMSval       = explode(":",$releaseAtval[1]);
            $article["disp_release_YMD"] = $YMDval[0]."/".$YMDval[1]."/".$YMDval[2];
            $article["disp_release_H"] = $HMSval[0];
            $article["disp_release_m"] = $HMSval[1];
            
    
            return $article;
        }
    


}
