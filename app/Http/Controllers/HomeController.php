<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function myCaptcha(){

        return view('myCaptcha');
    }

    public function myCaptchaPost(Request $request){
        
        $request->validation([
            'email'=>'required|email',
            'password'=>'required',
            'captcha'=>'required|captcha'
        ],['captcha.captcha'=>'Invalid Captcha Code.']);
    }

    public function refreshCaptcha(){

        return response()->json(['captcha'=>captcha_img()]);
        
    }
}
