<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Http\Controllers\Avail;
use \App\Models\Front\Category;
use \App\Models\Front\Article;

const PER_PAGE = 3;
class ArticleController extends Controller
{
    //
    public function index($url,$key,$page){
        $per_page = 2; //
        $mdCategory = new Category();
        $mdArticle = new Article();
        $categories = $mdCategory->getCategoriesList();
        $recentlylists = $mdArticle->getArticlesRecentlyList();
        $keyforurl = $key;
        if($url == "category"){
            $pagetitle = $mdCategory->getCategoryName($key);
        }elseif($url == "search"){
            $pagetitle = $key;
            $key = preg_split('/[\p{Z}\p{Cc}]++/u', $key);
        }
        $Articles = $mdArticle->getArticlesListByKey($url,$key);
        $data = AvailController::pagenator((array)$Articles,$page,$per_page);
        $dispArray =['categories' => $categories,
                     'recentlylists' => $recentlylists,
                     'Articles' => $data ->data,
                     'pagenator' => $data ->link,
                     'pagetitle' => $pagetitle,
                     'url' => $url,
                     'page' => $page,
                     'keyforurl' => $keyforurl
                    ];
        return view('front.article.list',$dispArray);
    }

    public function search(Request $request){
        if($request["key"] !== null){
            return redirect("/search/article-list/".$request["key"]."/1");
        }else{
            $ref = url()->previous();
            return redirect($ref);
        }
    }
}
