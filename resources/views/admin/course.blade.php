@extends('admin.mainsidebar')
@section('adminbanner')
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                   @if(session('success'))
                        <div class="alert alert-success" role="alert">
  {{session('success')}}
</div>
                    @endif
                    @if(session('successtwo'))
                        <div class="alert alert-success" role="alert">
  {{session('successtwo')}}
</div>
                    @endif
                    <table class="table">
                        <tr>
                            <th>Id</th>
                            <th>CourseName</th>
                            <th>CourseAmount</th>
                            <th>CoursePicture</th>
                            <th>CourseDesciption</th>
                            <th>Action</th>
                        </tr>

                        @foreach ($data as $data )
                            <tr>
                                <td>{{$data->id}}</td>
                                <td>{{$data->name}}</td>
                                <td>{{$data->amount}}</td>
                                <td><img src="{{url('storage/course/'.$data->pic)}}" alt="" width="100px" height="100px"></td>
                                <td>{{$data->desc}}</td>
                                <td>
                                    <a class="btn btn-success" href="{{route('editcourse', $data->id)}}"><i class="fa-solid fa-pen-to-square text-light"></i></a><a class="btn btn-danger" href="{{route('coursedel',$data->id)}}"><i class="fa-solid fa-trash text-light"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    
@endsection