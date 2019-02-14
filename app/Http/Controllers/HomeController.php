<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('chat');
    }
    public function admin()
    {
        return view('admichat');
    }
     public function chat()
    {
        return view('auth.userchat');
    }

    public function chatpost(Request $request)
    {
        $userchat = new User;
        $userchat->name = $request->input('name');
        $userchat->dni = $request->input('dni');
        $userchat->email = $request->input('email');
        $userchat->phone = $request->input('phone');
        $random_text= str_random(60);
        $token= $random_text;
        $userchat->tokenchat = $token;
        $userchat->save();

        return redirect('/');
        //return $credentials;

        //dd($credentials);

        //$user = User
    }
}
