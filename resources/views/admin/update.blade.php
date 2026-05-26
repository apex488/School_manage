@extends('admin.mainsidebar')
@section('adminbanner')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <form action="{{route('updatecourse' , $result->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <h1>Update <br> Course</h1>
                            </div>
                            <div class="col-md-6">
                                <input type="text" placeholder="CourseName" class="form-control mt-3" name="name" value="{{$result->name}}">
                                @error('name')
                                    <p class="text-warning">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <input type="text" placeholder="CourseAmount" class="form-control mt-3" name="amount" value="{{$result->amount}}">
                                @error('amount')
                                    <p class="text-warning">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <input type="file" class="form-control mt-3" placeholder="CourseImage" name="image" value="{{$result->pic}}">
                                 <img src="{{url('storage/course/' . $result->pic)}}" alt="" width="100%" height="140px" class="mt-3">
                                
                                @error('image')
                                    <p class="text-warning">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <textarea name="description" class="form-control mt-3" placeholder="CourseDescription">{{$result->desc}}</textarea>
                                @error('description')
                                    <p class="text-warning">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="col-md-5"></div>
                            <div class="col-md-2">
                                <button class="btn">Update</button>
                            </div>
                            <div class="col-md-5"></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection