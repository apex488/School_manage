<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class userController
{
    function webpage(){
        return view('user.web');
    }
    function sidebar(){
        return view('user.mainsidebar');
    }
}
