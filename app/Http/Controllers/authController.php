<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class authController extends Controller
{
    function reg(){
        return view('auth.register');
    }
    function log(){
        return view('auth.login');
    }
    function reguser(request $req){
       $result=$req->validate([
        "name"=>"required",
        "mail"=>"required|email|unique:users,mail",
        "password"=>"required"
       ]);

    
        $data=user::create($result);

        if($data){
            return redirect()->route('loginpage')->with('success','User Register Successfully');
        }
        else{
            return redirect()->route('registerpage');
        }

    }
    function loguser(request $req){
        $log=$req->validate([
            "mail"=>"required",
            "password"=>"required"
        ]);
        $cheak=auth::attempt($log);
        if($cheak){
            return redirect()->route('adminfunc')->with('success','User Login Successfully');
        }
        else{
            return back()->with('error','User Email & Password Invalid');
        }
    }
    function logout(){
       Auth::logout();
       return redirect()->route('loginpage')->with('success','User Logout Successfully');
    }
}
