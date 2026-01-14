<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Teacher;


class teacherController extends Controller
{
    function allteacher(){

        $back=teacher::all();
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
            'course_id'=>'required',
        ]);

        $result=new Teacher();
        $result->name=$data['name'];
        $result->age=$data['age'];
        $result->qualification=$data['qualification'];
        $result->course_id=$data['course_id'];
        $result->save();

        if($result){
            return redirect()->route('allteacher')->with('success','Teacher Add Successfully');
        }
        else{
            return back()->with('error','Teacher Not Add');
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
   function updateteacher(){
   
   }
}