<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('admin')->namespace('Admin')->name('admin.')->group(function(){
    Auth::routes(); //管理者登録あり
    // Auth::routes(['register' => false]);//管理者登録なし
    Route::get('/home', 'AdminHomeController@index')->name('admin_home');
    Route::get('foo/{name?}', 'FooController@index')->where('name', '[A-Za-z]+');
    Route::get('/artical/list', 'AdminBlogController@index')->name('artical_list');    
    Route::get('/inquery/list', 'AdminInqueryController@index')->name('inquery_list');    
    Route::get('/test', 'AdminTestController@index')->name('admin_home');
    //Admin-Ctegory
    Route::group(['prefix' => 'category'], function () {
        Route::get('/list', 'CategoryController@getIndex')->name('category_list');
        Route::get('/edit/{id}', 'CategoryController@edit')->where('name', '[1-9]+');
        Route::post('/updata', 'CategoryController@updata')->name('category_updata');
    });    
});