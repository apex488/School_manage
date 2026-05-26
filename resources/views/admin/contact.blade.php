@extends('admin.mainsidebar')
@section('adminbanner')
@if (session('success'))
    <div class="alert alert-success text-center" role="alert">
{{session('success')}}
</div>
@endif
    <table class="table text-center">
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Mail</th>
            <th>Subject</th>
            <th>Message</th>
            <th>Action</th>
        </tr>
        @foreach ($data as $data)
            <tr>
                <td>{{$data->id}}</td>
                <td>{{$data->name}}</td>
                <td>{{$data->mail}}</td>
                <td>{{$data->subject}}</td>
                <td>{{$data->message}}</td>
                <td><a class=" btn btn-danger" href="{{route('contactdelete', $data->id)}}"><i class="fa-solid fa-trash-can text-light"></i></a><a class=" btn btn-success" href="{{route('contactedit', $data->id)}}"><i class="fa-regular fa-pen-to-square text-light"></i></a></td>
            </tr>
        @endforeach
    </table>
@endsection