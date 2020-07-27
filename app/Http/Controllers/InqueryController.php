<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\InqueryReturn;
use \App\Models\Front\Inquery;
use \App\Models\Front\Category;
use \App\Models\Front\Article;

class InqueryController extends Controller
{
    //
    public function index(){
        $mdCategory = new Category();
        $mdArticle = new Article();
        $categories = $mdCategory->getCategoriesList();
        $recentlylists = $mdArticle->getArticlesRecentlyList();
        return view('front.inquery.regist', ['categories' => $categories,'recentlylists' => $recentlylists]);
    }

    public function confirm(Request $request){
        $mdCategory = new Category();
        $mdArticle = new Article();
        $categories = $mdCategory->getCategoriesList();
        $recentlylists = $mdArticle->getArticlesRecentlyList();
        $data = $request->all();
        $request->session()->put($data); 
        $mdInquery   = new Inquery();
        $valirule     = $mdInquery->getValirule();
        $validatedData = $request->validate($valirule);

        return view('front.inquery.confirm', ['inquery' => $request,'categories' => $categories,'recentlylists' => $recentlylists]);
    }

    public function complete(Request $request){
        $mdCategory = new Category();
        $mdArticle = new Article();
        $categories = $mdCategory->getCategoriesList();
        $recentlylists = $mdArticle->getArticlesRecentlyList();
        $action = $request->get('action', 'back');
        if(isset($action) && $action == "送信する"){
            $action = "submit";
        }else{
            $action = "back";
        }
        // 二つ目は初期値です。
        $input = $request->except('action');
        if($action === 'submit') {

            $mdInquery   = new Inquery();
            $valirule     = $mdInquery->getValirule();
            $validatedData = $request->validate($valirule);

            $name = $input["name"];
            $text = $input["main_text"];
            $to = $input["adress"];
            Mail::to($to)->send(new InqueryReturn($name, $text));
    
            $inquery = new Inquery();
            $inquery ->name = $input["name"];
            $inquery ->adress = $input["adress"];
            $inquery ->main_text = $input["main_text"];
            $inquery ->response = 0;
            $result = $inquery ->save();
                
            return view('front.inquery.complete',['categories' => $categories,'recentlylists' => $recentlylists]);
        } else {
            return redirect()->action('InqueryController@index')
                             ->withInput($input);
        }
    }

}
