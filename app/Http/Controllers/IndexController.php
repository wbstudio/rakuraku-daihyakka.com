<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    //Top画面
    public function index(){
        return view('front.index');
    }
}
