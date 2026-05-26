<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\course as ModelsCourse;
use App\Models\event;
use App\Models\Teacher;
use App\Models\teacher as ModelsTeacher;
use Illuminate\Support\Facades\File;

class teacherController extends Controller
{
    function allteacher(){

        $back=teacher::with('course')->get();
        return view('admin.teacher',compact('back'));
    }
    function insertteacher(){
        $result=course::all();
        return view('admin.inserteacher', compact('result'));
    }
    function senddata(Request $req){
        $data=$req->validate([
            'name'=>'required',
            'age'=>'required',
            'qualification'=>'required',
            'course'=>'required',
            'image'=>'required|image|mimes:png,jpg,jpeg,svg',
        ]);

        $file=$req->file('image')->store('teacher' , 'public');
        $base=basename($file);

        $result= new ModelsTeacher();
        $result->name=$data['name'];
        $result->age=$data['age'];
        $result->qualification=$data['qualification'];
        $result->course_id=$data['course'];
        $result->image=$base;
        $result->save();

        if($result){
            return redirect()->route('allteacher')->with('success' , 'Teacher Add Successfully');
        }
        else{
            return back();
        }
}
   function teacherdel($id){

    $del=Teacher::destroy($id);

    if($del){
        return redirect()->route('allteacher')->with('success','Teacher Deleted Successfully');
    }
    else{
        return back();
    }

   }
   function editteaher($id){
    
    $result=teacher::find($id);
    $data=course::all();

    return view('admin.updateteacher' , compact('result','data'));
    
   }
   function updateteacher($id,Request $req){

   $data=Teacher::find($id);
   $data->name=$req['name'];
   $data->age=$req['age'];
   $data->qualification=$req['qualification'];
   $data->course_id=$req['course'];
   if($req->file('image')){


        $oldpath=storage_path('app/public/teacher/'. $data->image);
        
        if(File::exists($oldpath)){
           File::delete($oldpath);
        }
       $file=$req->file('image')->store('teacher',"public");
       $path=basename($file);

       $data->image=$path;
       $data->save();
       return redirect()->route('allteacher')->with('success','Course Updated With Image');
    }
    else{
        $data->save();
        return redirect()->route('allteacher')->with('success','Course Updated Without Image');
    }
   }

   function event(){

   $result=event::all();
    return view('admin.event' , compact('result'));
   }
   function insertevent(){
    return view('admin.insertevent');
   }

   function sendevent(Request $req){
    $data=$req->validate([
        'date'=>'required',
        'location'=>'required',
        'image'=>'required|image|mimes:png,jpg,jpeg,svg',
        'description'=>'required',
    ]);

    $file=$req->file('image')->store('event' , 'public');
    $base=basename($file);

    $result=new event();
    $result->date=$data['date'];
    $result->location=$data['location'];
    $result->image=$base;
    $result->description=$data['description'];
    $result->save();

    if($result){
        return redirect()->route('event')->with('success' , 'Event Add Successfully');
    }
    else{
        return back();
    }
   }
   function deleteevent($id){
    
   $data=event::destroy($id);
   if($data){
    return redirect()->route('event')->with('success' ,'Event Delete Successfully');
   }
   else{
    return back();
   }
   }
      function editevent($id){
    
    $data=event::find($id);

    return view('admin.updateevent', compact('data'));
   }
   function updateevent($id , Request $req){

   $data=event::find($id);
   $data->date=$req['date'];
   $data->location=$req['location'];
   $data->description=$req['description'];
      if($req->file('image')){


        $oldpath=storage_path('app/public/event/'. $data->image);
        
        if(File::exists($oldpath)){
           File::delete($oldpath);
        }
       $file=$req->file('image')->store('event',"public");
       $path=basename($file);

       $data->image=$path;
       $data->save();
       return redirect()->route('event')->with('success','Event Updated With Image');
    }
    else{
        $data->save();
        return redirect()->route('event')->with('success','Event Updated Without Image');
    }
   }
}