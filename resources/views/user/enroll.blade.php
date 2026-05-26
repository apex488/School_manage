@extends('user.mainsidebar')
@section('userbanner')
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8" style="margin-top: 200px; margin-bottom:100px; text-align:center;">
                <h1>Enroll Here</h1>
                @if (session('success'))
                    <div class="alert alert-success" role="alert">
 {{session('success')}}
</div>
                @endif
                @if (session('danger'))
                    <div class="alert alert-warning" role="alert">
 {{session('danger')}}
</div>
                @endif
                <form action="{{route('enrollform' , $result->id)}}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <input type="text" placeholder="Name" class="form-control" name="name" value="{{Auth::user()->name}}" readonly>
                            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                        </div>
                        <div class="col-md-6">
                            <input type="number" placeholder="Age" class="form-control" name="age">
                            @error('age')
                                <p class="text-warning">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <input type="text" placeholder="E-Mail" class="form-control mt-3"  name="mail" value="{{Auth::user()->mail}}" readonly>
                            @error('mail')
                                <p class="text-warning">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <input type="number" placeholder="Phone" class="form-control mt-3" name="phone">
                            @error('phone')
                                <p class="text-warning">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <select name="gender" class="form-control mt-3" style="height: 59px">
                                <option value="" selected disabled>Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                            @error('gender')
                                <p class="text-warning">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <input type="number" placeholder="Amount" class="form-control mt-3" value="{{$result->amount}}" name="amount" readonly>
                        </div>
                        <div class="col-md-6">
                            <select name="qualification" class="form-control mt-3" style="height:59px;">
                                <option value="" selected disabled>Select Qualification</option>
                                <option value="matric">Matric</option>
                                <option value="intermediate">Intermediate (FA/FSc/ICS/ICom)</option>
                                <option value="diploma">Diploma</option>
                                <option value="bachelor">Bachelor's (BA/BSc/BCom/BS)</option>
                                <option value="master">Master's (MA/MSc/MCom/MS)</option>
                                <option value="mphil">MPhil</option>
                                <option value="phd">PhD</option>
                                <option value="other">Other</option>
                            </select>
                            @error('qualification')
                                <p class="text-warning">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <input type="text" placeholder="Course" class="form-control mt-3" name="course" value="{{$result->name}}" readonly>
                            <input type="hidden" name="course_id" value="{{$result->id}}">
                        </div>
                        <div class="col-md-10"></div>
                        <div class="col-md-2">
                            <button class="btn btn-primary btn-sm mt-3">Apply now</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-2"></div>
        </div>
@endsection