<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use Request;
use \App\Models\Admin\Category;
use \App\Define\Define;

class CategoryController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function getindex()
    {
        $mdCategory = new Category();
        $categories = $mdCategory->getCategoriesList();
         return view('admin.category.list', ['categories' => $categories]);
    }

    public function edit($id)
    {
        $mdCategory   = new Category();
        $category     = $mdCategory->getCategoryById($id);
        $categories   = $mdCategory->getCategoriesList();
        $mdDefine     = new Define();
        $timeselecter = $mdDefine->getSelectTimeList();
        $return = ['category' => $category,
                   'categories' => $categories,
                   'timeselecter' => $timeselecter
                  ];
        return view('admin.category.edit', $return);
    }

    public function updata(Request $request)
    {
        //validation
        $mdCategory   = new Category();
        $valirule     = $mdCategory->getValirule();
        $validatedData = $request->validate($valirule);
        //time
        $releaseDay  = str_replace("/","-",$request["release_day"]);
        $releaseHour = str_pad($request["release_hour"], 2, 0, STR_PAD_LEFT);
        $releaseMin  = str_pad($request["release_minute"], 2, 0, STR_PAD_LEFT);
        $releaseDate = $releaseDay." ".$releaseHour.":".$releaseMin;
        //DB
        $category = Category::where("id",$request["id"])->first();
        $category ->name = $request["name"];
        $category ->main_id = $request["main_id"];
        $category ->release_at = $releaseDate;
        $result = $category ->save();
        return redirect("/admin/category/list");
    }

    public function regist()
    {
        $mdCategory = new Category();
        $categories = $mdCategory->getCategoriesList();

        return view('admin.category.regist', ['categories' => $categories]);
    }

    public function registdata(Request $request)
    {
        //validation
        $mdCategory   = new Category();
        $valirule     = $mdCategory->getValirule();
        $validatedData = $request->validate($valirule);
        //time
        $releaseDay  = str_replace("/","-",$request["release_day"]);
        $releaseHour = str_pad($request["release_hour"], 2, 0, STR_PAD_LEFT);
        $releaseMin  = str_pad($request["release_minute"], 2, 0, STR_PAD_LEFT);
        $releaseDate = $releaseDay." ".$releaseHour.":".$releaseMin;
        //DB
        $category = new Category();
        $category ->name = $request["name"];
        $category ->main_id = $request["main_id"];
        $category ->release_at = $releaseDate;
        $result = $category ->save();
        return redirect("/admin/category/list");
    }
    public function deleteFlag(Request $request)
    {
        // var_dump($_POST["del_id"]);
        $deleteIds = $request["del_id"];
        $update_column = [
            'delete_flag' => 1,
        ];
        if(count($deleteIds) != 0){
            Category::whereIn("id",$request["del_id"])
            ->update($update_column);
            Category::whereIn("main_id",$request["del_id"])
            ->update($update_column);
        }
        return redirect("/admin/category/list");
    }

}
