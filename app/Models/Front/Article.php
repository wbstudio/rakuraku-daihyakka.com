<?php

namespace App\Models\Front;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    //
    protected $dates = [
        'release_at', //追加する。
        'created_at',
        'updated_at',
    ];
    public function getArticlesRecentlyList($type=null)
    {

        $columnList = [
            "ar.id as id",
            "name",
            "title",
            "ar.release_at",
        ];
        $whereList = [
            ["ar.delete_flag","=",0],
            ["ar.release_at","<",NOW()]
        ];

        $aList =$this::from("articles as ar")
                    ->join("categories as ca","ar.category_id","=","ca.id")
                    ->where($whereList)
                    ->orderby("ar.release_at","desc")
                    ->limit(3)
                    ->get($columnList);
        return $aList;
    }

    public function getArticlesListByKey($url,$key)
    {
        $columnList = [
            "ar.id as id",
            "name",
            "title",
            "main",
            "ar.release_at",
            "ca.name as category_name"
        ];
        $whereList = [
            ["ar.delete_flag","=",0],
            ["ar.release_at","<",NOW()],
        ];
        if($url == "category"){
            $whereList[] = ["ar.category_id","=",(int)$key];
        }elseif($url == "search"){
            foreach($key as $word){
                $whereList[] = ["ar.main","LIKE","%".$word."%"];
            }
        }
        $aList =$this::from("articles as ar")
                    ->join("categories as ca","ar.category_id","=","ca.id")
                    ->where($whereList)
                    ->orderby("ar.release_at","desc")
                    ->get($columnList);
        return $aList;
    }

}
