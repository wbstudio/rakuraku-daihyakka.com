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
    Route::get('/categoly_list', 'AdminCategolyController@index')->name('admin_home');    
    Route::get('/blog_list', 'AdminBlogController@index')->name('admin_home');    
    Route::get('/inquery_list', 'AdminInqueryController@index')->name('admin_home');    
    Route::get('/test', 'AdminTestController@index')->name('admin_home');    
});