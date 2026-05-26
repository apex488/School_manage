<?php

namespace App\Http\Controllers;

use App\Mail\wellcomemail;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

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
       $message="Your account has been successfully created. We are happy to have you with us.";
       $subject="Thank you for registering on our website.";
       Mail::to($req->mail)->send( new wellcomemail($message , $subject , $req->mail , $req->password, $req->name));

    
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
