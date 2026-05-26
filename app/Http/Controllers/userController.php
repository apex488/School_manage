<?php

namespace App\Http\Controllers;

use App\Models\contact;
use App\Models\course;
use App\Models\event;
use App\Models\newsletter;
use App\Models\registration;
use App\Models\teacher;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class userController
{
    function webpage(){
        $data=course::limit(6)->get();
        $event=event::limit(3)->get();
        $teacher=teacher::with('course')->limit(3)->get();
        return view('user.web' , compact('data', 'event', 'teacher'));
    }
    function sidebar(){
        return view('user.mainsidebar');
    }
    function about(){
        
        return view('user.about');
    }
    function coursepage(){
        $course=course::all();
        return view('user.course' , compact('course'));
    }
    function eventpage(){
        $event=event::all();
        return view('user.event' , compact('event'));
    }
    function contactpage(){
        return view('user.contact');
    }
    function contactform(Request $req){
        $data=$req->validate([
            'name'=>'required',
            'mail'=>'required',
            'subject'=>'required',
            'message'=>'required'
        ]);
        $result=new contact();
        $result->name=$data['name'];
        $result->mail=$data['mail'];
        $result->subject=$data['subject'];
        $result->message=$data['message'];
        $result->save();

        if($result){
            return redirect()->route('contactpage')->with('success', 'Your message has been sent successfully!');
        }
        else{
            return back();
        }
    }

    function enrollpage($id){
        $result=course::find($id);
        return view('user.enroll' ,compact('result') );
    }

function enrollform($id, Request $req){


    $data = $req->validate([
        'name'=>'required',
        'age'=>'required',
        'mail'=>'required',
        'phone'=>'required',
        'amount'=>'required',
        'qualification'=>'required',
        'course'=>'required',
        'gender'=>'required',
    ]);

    // check if already enrolled
    $check = registration::where('mail', $data['mail'])
            ->where('course_name', $data['course'])
            ->exists();

    if($check){
        return back()->with('danger' , 'You are already enrolled in this course.');
    }

    $result = new registration();
    $result->user_id = $req['user_id'];
    $result->age = $data['age'];
    $result->mail = $data['mail'];
    $result->phone = $data['phone'];
    $result->amount = $data['amount'];
    $result->qualification = $data['qualification'];
    $result->course_name = $req['course_id'];
    $result->gender = $data['gender'];
    $result->save();

    return redirect()->route('enrollpage' , $id)
           ->with('success' , 'Congratulations! You have successfully enrolled in this course.');
}

function historypage(){
    $result=registration::with('course' ,'user')->where('user_id' , Auth::user()->id)->get();
    return view ('user.history' , compact('result'));
}

function teacher(){
    $teacher=teacher::all();
    return view('user.teacher' , compact('teacher'));
}
function faq(){
    return view('user.faq');
}


function newsletter(Request $req){
    $data=$req->validate([
        'mail'=>'required|email|unique:newsletters,mail'
    ]);
    $result=new newsletter();
    $result->mail=$data['mail'];
    $result->save();

    if($result){
        return redirect()->route('website')->with('success', 'Thank you for subscribing to our newsletter.');
    }
    else{
        return back();
    }

}


}

