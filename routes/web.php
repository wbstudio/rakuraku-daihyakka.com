<?php

use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
|フロント画面 
|--------------------------------------------------------------------------
*/
//Top画面
Route::get('/', 'IndexController@index')->name('index');
//Category画面
Route::get('/category', 'CategoryController@index')->name('category');
//記事一覧(→Category)
Route::get('/{url}/article-list/{key}/{page}', 'ArticleController@index')->where(['key', '[1-9]+'],['page', '[1-9]+']);
//記事一覧(→検索窓)
Route::post('/search/article-list', 'ArticleController@search')->name('search');
Route::get('/{url}/article-list/{key}/{page}', 'ArticleController@index');
//記事一覧(→Category)
Route::get('/article', 'ArticleController@index')->name('article');
Route::get('/article/{key}', 'ArticleController@index')->where('name', '[1-9]+');
//問い合わせ()
Route::get('/inquery', 'InqueryController@index')->name('inquery');
//問い合わせ()
Route::post('/inquery', 'InqueryController@confirm')->name('inquery');
//問い合わせ()
Route::post('/inquery/complete', 'InqueryController@complete')->name('inquery_complete');

/*
|--------------------------------------------------------------------------
|機能用ルーター 
|--------------------------------------------------------------------------
*/
//メール送信系
Route::get('/mail', function () {
    return new App\Mail\SendTestMail();
});
Route::get('/send', 'MailSendController@send');

//ユーザーログイン（filemanager利用時に必要）
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

/*
|--------------------------------------------------------------------------
|管理画面一覧 
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->namespace('Admin')->name('admin.')->group(function(){
    Auth::routes(); //管理者登録あり
    // Auth::routes(['register' => false]);//管理者登録なし

    //管理画面-TOP
    Route::get('/home', 'AdminHomeController@index')->name('admin_home');

    //管理画面-カテゴリー
    Route::group(['prefix' => 'category'], function () {
        Route::get('/list', 'CategoryController@getIndex')->name('category_list');
        Route::post('/list', 'CategoryController@deleteFlag')->name('category_list');
        Route::get('/regist', 'CategoryController@regist')->name('category_regist');
        Route::post('/regist', 'CategoryController@registdata')->name('category_regist');
        Route::get('/edit/{id}', 'CategoryController@edit')->where('name', '[1-9]+');
        Route::post('/updata', 'CategoryController@updata')->name('category_updata');
    });    
    //管理画面-記事
    Route::group(['prefix' => 'article'], function () {
        Route::get('/list', 'ArticleController@getIndex')->name('article_list');
        Route::post('/list', 'ArticleController@deleteFlag')->name('article_list');
        Route::get('/regist', 'ArticleController@regist')->name('article_regist');
        Route::post('/regist', 'ArticleController@registdata')->name('article_regist');
        Route::get('/edit/{id}', 'ArticleController@edit')->where('name', '[1-9]+');
        Route::post('/updata', 'ArticleController@updata')->name('article_updata');
    });    
    //管理画面-問い合わせ
    Route::group(['prefix' => 'inquery'], function () {
        Route::get('/list', 'InqueryController@getIndex')->name('inquery_list');
        Route::post('/list', 'InqueryController@deleteFlag')->name('inquery_list');
        Route::get('/reposponse/{id}', 'InqueryController@response')->where('name', '[1-9]+');
        Route::post('/reposponse', 'InqueryController@send')->name('inquery_reposponse');
    });    
});