@extends('admin.mainsidebar')
@section('adminbanner')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <form action="{{route('insert.data')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <h1>Add <br> Course</h1>
                            </div>
                            <div class="col-md-6">
                                <input type="text" placeholder="CourseName" class="form-control mt-3" name="name" >
                                @error('name')
                                    <p class="text-warning">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <input type="text" placeholder="CourseAmount" class="form-control mt-3" name="amount">
                                @error('amount')
                                    <p class="text-warning">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <input type="file" class="form-control mt-3" placeholder="CourseImage" name="image">
                                @error('image')
                                    <p class="text-warning">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <textarea name="description" class="form-control mt-3" placeholder="CourseDescription"></textarea>
                                @error('description')
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