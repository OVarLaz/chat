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
        return view('auth.userchat');

    }

    public function show($id)
    {
         $existeuserchat = User::find($id);
        return view('chat')->with('userchat',$existeuserchat);
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
        $userchat=null;
        if($request->input('dni') && strlen($request->input('dni'))>=8)
        {
            $iduser=0;
            $existeuser = User::select('id')
            ->where('dni','=',$request->input('dni'))
            ->first();

            if($existeuser)
            {
                //update user
                $userchat = User::find($existeuser->id);
                $userchat->name = $request->input('name');
                $userchat->email = $request->input('email');
                $userchat->phone = $request->input('phone');
                $random_text= str_random(60);
                $token= $random_text;
                $userchat->tokenchat = $token;
                $userchat->save();

                $iduser = $existeuser->id;
                

            }
            else
            {
                //create user
                $userchat = new User;
                $userchat->name = $request->input('name');
                $userchat->dni = $request->input('dni');
                $userchat->email = $request->input('email');
                $userchat->phone = $request->input('phone');
                $random_text= str_random(60);
                $token= $random_text;
                $userchat->tokenchat = $token;
                $userchat->save();

                $iduser = $userchat->id;

            }
        }

        return $userchat;
        
    }
}
