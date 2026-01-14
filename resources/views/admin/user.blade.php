@extends('admin.mainsidebar');
@section('adminbanner')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
         <div class="container">
            <div class="style">
             <div class="row">
                <div class="col-md-12 text-center">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
  {{session('success')}}
</div>
                    @endif
                    <table class="table text-center">
                        <tr>
                            <th>ID</th> 
                            <th>Name</th>
                            <th>Mail</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                        @foreach ($data as $result )
                            <tr>
                                <td>{{$result->id}}</td>
                                <td>{{$result->name}}</td>
                                <td>{{$result->mail}}</td>
                                <td>{{$result->role}}</td>
                                <td><a href=""><i class="fa-solid fa-pen-to-square text-success"></i></a>||<a href="{{route('userdel',$result->id)}}"><i class="fa-solid fa-trash text-danger"></i></a></td>
                                
                            </tr>
                        @endforeach
                    </table>
                </div>
                
            </div>
            </div>
        </div>
</body>
</html>
@endsection


