<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \App\Models\Admin\Inquery;
use Mail;
use App\Mail\InqueryResponse;


class InqueryController extends Controller
{
    //
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
        $mdInquery = new Inquery();
        $inqueries = $mdInquery->getInqueriesList();
         return view('admin.inquery.list', ['inqueries' => $inqueries]);
    }


    public function response($id)
    {
        $mdInquery = new Inquery();
        $inqueries = $mdInquery->getInquery($id);
        $inquery = $inqueries[0];
        return view('admin.inquery.response', ['inquery' => $inquery]);
    }

    public function send(Request $request)
    {
                //validation
        $mdInquery = new Inquery();
        $valirule     = $mdInquery->getValirule();
        $validatedData = $request->validate($valirule);

        $name = $request["name"];
        $text["title"] = $request["resp_title"];
        $text["main"] = $request["resp_text"];
        $to = $request["adress"];
        Mail::to($to)->send(new InqueryResponse($name, $text));

        $update_column = [
            'resp_title' => $request["resp_title"],
            'resp_text' => $request["resp_text"],
            'response' => 1,
        ];
        Inquery::where("id",$request["id"])
        ->update($update_column);

        return view('admin.inquery.complete');
    }


}
