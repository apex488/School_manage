<?php

namespace App\Http\Controllers;

use App\Models\contact;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\course;
use App\Models\event;
use App\Models\newsletter;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;

class adminController extends Controller
{
    function adfunc(){
        $user=User::count();
        $event=event::count();
        $course=course::count();
        $contact=contact::count();
        return view('admin.admin' , compact('user' , 'event', 'course' , 'contact'));
    }
    function addfunc(){
        return view('admin.mainsidebar');
    }
    function page(){

        $result=user::all();

        return view('admin.user',['data'=>$result]);
    }
    function delete($id){

    $user = User::findOrFail($id);

    if($user->role === 'admin'){
        return back()->with('alert' , 'You Can,t Delete This User');
    }
    $user->delete();
    return redirect()->route('userpage')->with('success','User deleted successfully');
    }
    function insert(){
        return view('admin.insert');
    }
     function course(){
        $data=course::all();
        return view('admin.course', compact('data'));
    }

    //insertcourse function

    function datainsert(request $req){
        $data=$req->validate([
            "name"=>'required',
            "amount"=>'required',
            "image"=>'required |image|mimes:png,jpg,svg',
            "description"=>'required' 
        ]);
        $file=$req->file('image')->store('course','public');
        $name=basename($file);



    $course=new course();
    $course->name=$data['name'];
    $course->amount=$data['amount'];
    $course->pic=$name;
    $course->desc=$data['description'];
    $course->save();

    if($course){
        return redirect()->route('allcourse')->with('success','Course Inserted Successfully');
    }
    else{
        return back();
    }
        
    }
    //deletecourse function
    
   function deletecourse($id){

    $data=course::destroy($id);
    
    if($data){
        return redirect()->route('allcourse')->with('successtwo','Course Delete Successfully');
    }
    return back();

   }

   function edit($id){

    $result=course::find($id);
    return view('admin.update' , compact('result') ) ;
   }
   function updatecourse(Request $req ,$id){

    $data=course::find($id);
    $data->name=$req['name'];
    $data->amount=$req['amount'];
    $data->desc=$req['description'];
    
    if($req->file('image')){


        $oldpath=storage_path('app/public/course/'. $data->pic);
        
        if(File::exists($oldpath)){
           file::delete($oldpath);
        }
       $file=$req->file('image')->store('course',"public");
       $path=basename($file);

       $data->pic=$path;
       $data->save();
       return redirect()->route('allcourse')->with('success','Course Updated With Image');
    }
    else{
        $data->save();
        return redirect()->route('allcourse')->with('success','Course Updated Without Image');
    }
   }
   function useredit($id){
    $data=User::find($id);

    return view('admin.userupdate' , compact('data'));
   }
   function userupdate($id , Request $req){

   $result=User::find($id);
   $result->name=$req['name'];
   $result->mail=$req['mail'];
   $result->password=$req['password'];
   $result->role=$req['role'];
   $result->save();

   if($result){
    return redirect()->route('userpage')->with('success' , 'User Data Update Successfully');
   }
   else{
    return back();
   }
   }

   function admincontact(){
    $data=contact::all();
    return view('admin.contact' ,compact('data'));
   }

   function contactdelete($id){
    $data=contact::destroy($id);

    if($data){
        return redirect()->route('admincontact')->with('success', 'Message Delete Successfully');
    }
    else{
        return back();
    }
   }

   function contactedit($id){
    $data=contact::find($id);

    return view('admin.updatecontact' , compact('data'));
   }

   function contactupdate(Request $req , $id){
    $result=contact::find($id);
    $result->name=$req['name'];
    $result->mail=$req['mail'];
    $result->subject=$req['subject'];
    $result->message=$req['message'];
    $result->save();

    if($result){
        return redirect()->route('admincontact')->with('success', 'Message Update Successfully');
    }
    else{
        return back();
    }


   }
   function adminlogout(){
    Auth::logout();

    return redirect()->route('loginpage')->with('success' , 'Admin Logout Successfully');
   }



   function newsletter(){
    $result=newsletter::all();
    return view ('admin.newsletter' , compact('result'));
   }
   function newsletterform(Request $req){
        $emails = array_unique($req->emails);

    foreach ($emails as $email) {
        
        Mail::send('admin.newslettermail', [
            'msg' => $req->message
        ], function ($mail) use ($email, $req) {

            $mail->to($email)
                 ->subject($req->subject);

        });
    }

    return back()->with('success', '✅ Newsletter Sent Successfully!');
   }
}
