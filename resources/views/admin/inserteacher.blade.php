
@extends('admin.mainsidebar')
@section('adminbanner')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <form action="{{route('senddata')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <h1>Add <br> Teacher</h1>
                            </div>
                            <div class="col-md-6">
                                <input type="text" placeholder="TeacherName" class="form-control mt-3" name="name">
                                @error('name')
                                    <p class="text-warning">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <input type="number" placeholder="TeacherAge" class="form-control mt-3" name="age">
                               @error('age')
                                   <p class="text-warning">{{$message}}</p>
                               @enderror
                            </div>
                            <div class="col-md-6">
                                <select name="qualification" class="form-control mt-3">
                                   <option value="" selected disabled>Select Qualification</option>
                                   <option value="Secondary School Qualification">Secondary School Qualification</option>
                                   <option value="Higher Secondary Qualification">Higher Secondary Qualification</option>
                                   <option value="Diploma">Diploma</option>
                                   <option value="Bachelor’s Degree">Bachelor’s Degree</option>
                                   <option value="Master’s Degree">Master’s Degree</option>
                                </select>
                                @error('qualification')
                                    <p class="text-warning">{{$message}}</p>
                                @enderror   
                            </div>
                            <div class="col-md-6">
                                <select name="course" class="form-control mt-3">
                                   <option value="" selected disabled>Select Course</option>
                                      @foreach ($result as $result)
                                         <option value="{{$result->id}}">{{$result->name}}</option>
                                      @endforeach
                                </select>
                                @error('course')
                                    <p class="text-warning">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <input type="file" placeholder="TeacherImage" class="form-control mt-4" name="image">
                                @error('image')
                                   <p class="text-warning">{{$message}}</p>
                               @enderror
                            </div>
                            <div class="col-md-5"></div>
                            <div class="col-md-2">
                                <button class="btn">Insert</button>
                            </div>
                            <div class="col-md-5"></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection