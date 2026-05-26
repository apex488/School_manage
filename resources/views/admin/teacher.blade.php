@extends('admin.mainsidebar')
@section('adminbanner')
    <div class="container">
        <div class="row text-center">
            <div class="col-md-12 ">
                @if (session('success'))
                    <div class="alert alert-success" role="alert">
 {{session('success')}}
</div>
                @endif
                @if (session('error'))
                    <div class="alert alert-danger" role="alert">
 {{session('error')}}
</div>
                @endif
                <table class="table text-center">
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Age</th>
                        <th>Qualification</th>
                        <th>Course Name</th>
                        <th>Action</th>
                    </tr>
                  @foreach ($back as $back)
                       <tr>
                        <td>{{$back->id}}</td>
                        <td>{{$back->name}}</td>
                        <td>
                            <img src="{{url('storage/teacher/' , $back->image)}}" alt="" width="60px" height="60px">
                        </td>
                        <td>{{$back->age}}</td>
                        <td>{{$back->qualification}}</td>
                        <td>{{$back->course->name}}</td>
                        <td>
                            <a class="btn btn-danger" href="{{route('teacherdel', $back->id)}}"><i class="fa-solid fa-trash-can text-light"></i></a><a class="btn btn-success" href="{{route('editteacher',$back->id)}}"><i class="fa-solid fa-pen-to-square text-light"></i></a>
                        </td>
                       </tr> 
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection