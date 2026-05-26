@extends('admin.mainsidebar')
@section('adminbanner')
    <div class="container">
        <div class="row text-center">
            <div class="col-md-12">
                @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{session('success')}}
</div>
                @endif
                @if (session('alert'))
                    <div class="alert alert-danger" role="alert">
                        {{session('alert')}}
</div>
                @endif
                <table class="table">
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Mail</th>
                        <th>Password</th>
                        <th>Role</th>
                        <th>Action</th>
                    </tr>
                    @foreach ($data as $data)
                        <tr>
                            <td>{{$data->id}}</td>
                            <td>{{$data->name}}</td>
                            <td>{{$data->mail}}</td>
                            <td>{{$data->password}}</td>
                            <td>{{$data->role}}</td>
                            <td>
                                <a class="btn btn-success" href="{{route('useredit', $data->id)}}"><i class="fa-solid fa-pen-to-square text-light"></i></a><a class="btn btn-danger" href="{{route('userdel',$data->id)}}"><i class="fa-solid fa-trash text-light"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection