<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \App\Models\Admin\Article;
use \App\Models\Admin\Category;

use \App\Define\Define;


class ArticleController extends Controller
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
        $mdArticle = new Article();
        $articles = $mdArticle->getArticlesList();
         return view('admin.article.list', ['articles' => $articles]);
    }

    public function regist()
    {
        $mdCategory = new Category();
        $categories = $mdCategory->getPureCategoriesList();

        return view('admin.article.regist', ['categories' => $categories]);
    }

    public function registdata(Request $request)
    {
        //validation
        $mdArticle   = new Article();
        $valirule     = $mdArticle->getValirule();
        $validatedData = $request->validate($valirule);
        //time
        $releaseDay  = str_replace("/","-",$request["release_day"]);
        $releaseHour = str_pad($request["release_hour"], 2, 0, STR_PAD_LEFT);
        $releaseMin  = str_pad($request["release_minute"], 2, 0, STR_PAD_LEFT);
        $releaseDate = $releaseDay." ".$releaseHour.":".$releaseMin;
        //DB
        $article = new Article();
        $article ->title = $request["title"];
        $article ->main = $request["main"];
        $article ->category_id = $request["category_id"];
        $article ->release_at = $releaseDate;
        $result = $article ->save();
        return redirect("/admin/article/list");
    }
    public function edit($id)
    {
        $mdArticle   = new Article();
        $article     = $mdArticle->getArticleById($id);
        $mdCategory = new Category();
        $categories = $mdCategory->getPureCategoriesList();
        $mdDefine     = new Define();
        $timeselecter = $mdDefine->getSelectTimeList();
        $return = ['article' => $article,
                   'categories' => $categories,
                   'timeselecter' => $timeselecter
                  ];
        return view('admin.article.edit', $return);
    }

    public function updata(Request $request)
    {
        //validation
        $mdArticle   = new Article();
        $valirule     = $mdArticle->getValirule();
        $validatedData = $request->validate($valirule);
        //time
        $releaseDay  = str_replace("/","-",$request["release_day"]);
        $releaseHour = str_pad($request["release_hour"], 2, 0, STR_PAD_LEFT);
        $releaseMin  = str_pad($request["release_minute"], 2, 0, STR_PAD_LEFT);
        $releaseDate = $releaseDay." ".$releaseHour.":".$releaseMin;
        //DB
        $article = Article::where("id",$request["id"])->first();
        $article ->title = $request["title"];
        $article ->main = $request["main"];
        $article ->category_id = $request["category_id"];
        $article ->release_at = $releaseDate;
        $result = $article ->save();
        return redirect("/admin/article/list");
    }

    public function deleteFlag(Request $request)
    {
        var_dump($_POST["del_id"]);
        $update_column = [
            'delete_flag' => 1,
        ];
         $deleteIds = $request["del_id"];
         if(count($deleteIds) != 0){
            Article::whereIn("id",$request["del_id"])
            ->update($update_column);
        }
        return redirect("/admin/article/list");
    }


}
