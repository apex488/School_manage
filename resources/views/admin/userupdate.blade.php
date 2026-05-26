@extends('admin.mainsidebar')
@section('adminbanner')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <form action="{{route('userupdate', $data->id)}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <h1>User <br> Update</h1>
                            </div>
                            <div class="col-md-6">
                                <input type="text" placeholder="UserName" class="form-control mt-3" name="name" value="{{$data->name}}">
                            </div>
                            <div class="col-md-6">
                                <input type="text" placeholder="UserMail" class="form-control mt-3" name="mail" value="{{$data->mail}}">
                            </div>
                            <div class="col-md-6">
                                <select name="role" class="form-control mt-3">
                                    <option value="SelectRole" selected disabled>SelectRole</option>
                                    <option value="Admin" {{$data->role == 'admin' ? 'selected' : ''}}>Admin</option>
                                    <option value="User"{{$data->role == 'user' ? 'selected' : ''}}>User</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <input type="password" placeholder="UserPassword" class="form-control mt-3" value="{{$data->password}}" name="password">
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