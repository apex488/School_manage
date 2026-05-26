<?php

namespace App\Http\Controllers;

use App\Models\registration;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class pdfController extends Controller
{
    function pdf($id){

    $result=registration::find($id);

    $data=[
        "title"=> "This enrollment form has been generated from our system. Please keep this document for your record and present it when required.",
        'date'=> date('d/m/y'),
        'result'=>$result
    ];



    $pdf = Pdf::loadView('user.pdf', $data);
    return $pdf->download('Enrollment.pdf');
    }
}
