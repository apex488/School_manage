@extends('user.mainsidebar')
@section('userbanner')
    <!-- page title -->
<section class="page-title-section overlay" data-background="user/images/backgrounds/page-title.jpg">
  <div class="container">
    <div class="row">
      <div class="col-md-8">
        <ul class="list-inline custom-breadcrumb">
          <li class="list-inline-item"><a class="h2 text-primary font-secondary" href="courses.html">Our Courses</a></li>
          <li class="list-inline-item text-white h3 font-secondary "></li>
        </ul>
        <p class="text-lighten">Our courses offer a good compromise between the continuous assessment favoured by some universities and the emphasis placed on final exams by others.</p>
      </div>
    </div>
  </div>
</section>
<!-- /page title -->

<!-- courses -->
<section class="section">
  <div class="container">
    <div class="row justify-content-center">
        @foreach ($course as $course)
      <div class="col-lg-4 col-sm-6 mb-5 mb-lg-0">
        <div class="card border-0 rounded-0 hover-shadow mt-3">
          <img class="card-img-top rounded-0" src="{{url('storage/course/', $course->pic)}}" alt="teacher" height="400px">
          <div class="card-body">
            <a href="teacher-single.html">
              <h4 class="card-title">{{$course->name}}</h4>
            </a>
            <p>{{$course->desc}}</p>
            <ul class="list-inline">
              <li class="list-inline-item"><a class="text-color" href="#"><i class="ti-facebook"></i></a></li>
              <li class="list-inline-item"><a class="text-color" href="#"><i class="ti-twitter-alt"></i></a></li>
              <li class="list-inline-item"><a class="text-color" href="#"><i class="ti-google"></i></a></li>
              <li class="list-inline-item"><a class="text-color" href="#"><i class="ti-linkedin"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
      @endforeach
    </div>

  </div>
</section>
<!-- /courses -->
@endsection