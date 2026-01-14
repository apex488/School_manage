<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\course;
use Illuminate\Support\Facades\File;


class adminController extends Controller
{
    function adfunc(){
        return view('admin.admin');
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
        return back();
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
            "pic"=>'required |image|mimes:png,jpg,svg',
            "desc"=>'required' 
        ]);
        $file=$req->file('pic')->store('course','public');
        $name=basename($file);



    $course=new course();
    $course->name=$data['name'];
    $course->amount=$data['amount'];
    $course->pic=$name;
    $course->desc=$data['desc'];
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
    $data->desc=$req['desc'];
    
    if($req->file('pic')){


        $oldpath=storage_path('app/public/course/'. $data->pic);
        
        if(File::exists($oldpath)){
           file::delete($oldpath);
        }
       $file=$req->file('pic')->store('course',"public");
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

}
