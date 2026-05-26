@extends('user.mainsidebar')
@section('userbanner')
    <!-- teachers -->
<section class="section" style="margin-top: 100px">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-12">
          <h1 class="section-title text-center">Our Teachers</h1>
        </div>
        <!-- teacher -->
        @foreach ($teacher as $teacher)
        <div class="col-lg-4 col-sm-6 mb-5 mb-lg-0">
          <div class="card border-0 rounded-0 hover-shadow mt-3">
            <img class="card-img-top rounded-0" src="{{url('storage/teacher/' , $teacher->image)}}" alt="teacher" height="400px">
            <div class="card-body">
              <a href="teacher-single.html">
                <h4 class="card-title">{{$teacher->name}}</h4>
              </a>
              <div class="d-flex justify-content-between">
                <span>{{$teacher->qualification}}</span>
                <ul class="list-inline">
                  <li class="list-inline-item"><a class="text-color" href="#"><i class="ti-facebook"></i></a></li>
                  <li class="list-inline-item"><a class="text-color" href="#"><i class="ti-twitter-alt"></i></a></li>
                  <li class="list-inline-item"><a class="text-color" href="#"><i class="ti-google"></i></a></li>
                  <li class="list-inline-item"><a class="text-color" href="#"><i class="ti-linkedin"></i></a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </section>
  <!-- /teachers -->
@endsection