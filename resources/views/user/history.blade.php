@extends('user.mainsidebar')\
@section('userbanner')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="box" style="margin-top: 220px ; text-align:center;">
                <h1>Enroll History</h1>
                <table class="table" style="text-align: center; margin-top:20px; margin-bottom:150px;">
                    <tr>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Qualification</th>
                        <th>Amount</th>
                        <th>Course Name</th>
                        <th>Download</th>
                    </tr>
                    @foreach ($result as $result)
                        <tr>
                            <td>{{$result->user?->name}}</td>
                            <td>{{$result->phone}}</td>
                            <td>{{$result->qualification}}</td>
                            <td>{{$result->amount}}</td>
                            <td>{{$result->course?->name}}</td>
                            <td><a href="{{route('pdf' , $result->id)}}"><i style="font-size: 30px;" class="fa-solid fa-circle-down "></i></a></td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
    
@endsection