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
    public function index($id)
    {
        $id=0;
        if($id!=0){
            $existeuserchat = User::find($id)
            ->first();
        }
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
        if($request->input('dni') && strlen($request->input('dni'))>=8)
        {
            $iduser=0;
            $existeuser = User::select('id')
            ->where('dni','=',$request->input('dni'))
            ->first();

            if($existeuser)
            {
                $updateuser = User::find($existeuser->id);
                $updateuser->name = $request->input('name');
                $updateuser->email = $request->input('email');
                $updateuser->phone = $request->input('phone');
                $random_text= str_random(60);
                $token= $random_text;
                $updateuser->tokenchat = $token;
                $updateuser->save();

                $iduser = $existeuser->id;

            }
            else
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

                $iduser = $userchat->id;

            }
        }
        



        return redirect('/')
        ->with('iduser',$iduser);
        //return $credentials;

        //dd($credentials);

        //$user = User
    }
}
