@extends('admin.mainsidebar')
@section('adminbanner')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <form action="{{route('contactupdate', $data->id)}}" method="post" >
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <h1>Update <br> Contact</h1>
                            </div>
                            <div class="col-md-6">
                                <input type="text" placeholder="UserName" class="form-control mt-3" name="name" value="{{$data->name}}">
                                @error('name')
                                    <p class="text-warning">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <input type="text" placeholder="UserMail" class="form-control mt-3" name="mail" value="{{$data->mail}}">
                                @error('amount')
                                    <p class="text-warning">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control mt-3" placeholder="Subject" name="subject" value="{{$data->subject}}">
                                @error('image')
                                    <p class="text-warning">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <textarea name="message" class="form-control mt-3" placeholder="UserMessage">{{$data->message}}</textarea>
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