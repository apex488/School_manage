@extends('admin.mainsidebar')
@section('adminbanner')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <form action="{{route('sendevent')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <h1>Add <br> Events</h1>
                            </div>
                            <div class="col-md-6">
                                <input type="date" class="form-control mt-3" name="date" >
                                @error('date')
                                    <p class="text-warning">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <input type="text" placeholder="EventLocation" class="form-control mt-3" name="location">
                                @error('location')
                                    <p class="text-warning">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <input type="file" class="form-control mt-3" placeholder="EventImage" name="image">
                                @error('image')
                                    <p class="text-warning">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <textarea name="description" class="form-control mt-3" placeholder="EventDescription"></textarea>
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