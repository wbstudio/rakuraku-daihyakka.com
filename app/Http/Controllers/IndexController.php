<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Front\Category;
use \App\Models\Front\Article;
use \App\Define\Define;

class IndexController extends Controller
{
    //Top画面
    public function index(){
        $mdCategory = new Category();
        $mdArticle = new Article();
        $categories = $mdCategory->getCategoriesList();
        $recentlylists = $mdArticle->getArticlesRecentlyList();
        return view('front.index', ['categories' => $categories,'recentlylists' => $recentlylists]);
    }
}
