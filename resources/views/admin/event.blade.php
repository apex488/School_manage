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
                <table class="table">
                    <tr>
                        <th>Id</th>
                        <th>Date</th>
                        <th>Month</th>
                        <th>Location</th>
                        <th>Image</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                    @foreach ($result as $result)
                        <tr>
                            <td>{{$result->id}}</td>
                            <td>{{$result->date}}</td>
                            <td>{{$result->Month}}</td>
                            <td>{{$result->location}}</td>
                            <td>
                                <img src="{{url('storage/event/' , $result->image)}}" alt="" width="60px" height="60px">
                            </td>
                            <td>{{$result->description}}</td>
                            <td>
                                <a class="btn btn-danger" href="{{route('deleteevent' , $result->id)}}"><i class="fa-solid fa-trash-can text-light"></i></a><a class="btn btn-success" href="{{route('editevent' , $result->id)}}"><i class="fa-solid fa-file-pen text-light"></i></a>
                            </td>
                          
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection