
@extends('admin.mainsidebar')
@section('adminbanner')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <form action="{{route('updateteacher', $result->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <h1>Update<br> Teacher</h1>
                            </div>
                            <div class="col-md-6">
                                <input type="text" placeholder="TeacherName" class="form-control mt-3" name="name" value="{{$result->name}}">
                                @error('name')
                                    <p class="text-warning">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <input type="number" placeholder="TeacherAge" class="form-control mt-3" name="age" value="{{$result->age}}">
                               @error('age')
                                   <p class="text-warning">{{$message}}</p>
                               @enderror
                            </div>
                            <div class="col-md-6">
                                <select name="qualification" class="form-control mt-3">
                                   <option value="" selected disabled>Select Qualification</option>
                                   <option value="Secondary School Qualification" {{$result->qualification== 'Secondary School Qualification' ? 'selected' :'' }}>Secondary School Qualification</option>
                                   <option value="Higher Secondary Qualification"{{$result->qualification== 'Higher Secondary Qualification' ? 'selected' :'' }}>Higher Secondary Qualification</option>
                                   <option value="Diploma"{{$result->qualification== 'Diploma' ? 'selected' :'' }}>Diploma</option>
                                   <option value="Bachelor’s Degree" {{$result->qualification== 'Bachelor’s Degree' ? 'selected' :'' }}>Bachelor’s Degree</option>
                                   <option value="Master’s Degree" {{$result->qualification== 'Master’s Degree' ? 'selected' :'' }}>Master’s Degree</option>
                                </select>
                                @error('qualification')
                                    <p class="text-warning">{{$message}}</p>
                                @enderror   
                            </div>
                            <div class="col-md-6">
                                <select name="course" class="form-control mt-3">
                                   <option value="" selected disabled>Select Course</option>
                                      @foreach ($data as $data)
                                         <option value="{{$data->id}}"{{$data->id == $result->course_id ? 'selected' : ''}}>{{$data->name}}</option>
                                      @endforeach
                                </select>
                                @error('course')
                                    <p class="text-warning">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <input type="file" placeholder="TeacherImage" class="form-control mt-4" name="image">
                                <img src="{{url('storage/teacher' , $result->image)}}" alt="" width="100%" height="50px" class="mt-2">
                                @error('image')
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