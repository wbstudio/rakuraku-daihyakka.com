<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\InqueryReturn;
use \App\Models\Front\Inquery;

class InqueryController extends Controller
{
    //
    public function index(){
        return view('front.inquery.regist');
    }

    public function confirm(Request $request){

        $data = $request->all();
        $request->session()->put($data); 
        $mdInquery   = new Inquery();
        $valirule     = $mdInquery->getValirule();
        $validatedData = $request->validate($valirule);

        return view('front.inquery.confirm', ['inquery' => $request]);
    }

    public function complete(Request $request){
        $action = $request->get('action', 'back');
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
                
            return view('front.inquery.complete');
        } else {
            return redirect()->action('InqueryController@index')
                             ->withInput($input);
        }
    }

}