
@extends('user.mainsidebar')
@section('userbanner')
<section class="page-title-section overlay" data-background="user/images/backgrounds/page-title.jpg">
  <div class="container">
    <div class="row">
      <div class="col-md-8">
        <ul class="list-inline custom-breadcrumb">
          <li class="list-inline-item"><a class="h2 text-primary font-secondary" href="@@page-link">Upcoming Events</a></li>
          <li class="list-inline-item text-white h3 font-secondary @@nasted"></li>
        </ul>
        <p class="text-lighten">Our courses offer a good compromise between the continuous assessment favoured by some universities and the emphasis placed on final exams by others.</p>
      </div>
    </div>
  </div>
</section>

<section class="section">
  <div class="container">
    <div class="row">
      @foreach ($event as $event)
    <div class="col-lg-4 col-sm-6 mb-5">
        <div class="card border-0 rounded-0 hover-shadow">
          <div class="card-img position-relative">
            <img class="card-img-top rounded-0" src="{{url('storage/event/' , $event->image)}}" alt="event thumb" height="400px">
            <div class="card-date"><span>{{$event->date}}</span><br>{{$event->Month}}</div>
          </div>
          <div class="card-body">
            <!-- location -->
            <p><i class="ti-location-pin text-primary mr-2"></i>{{$event->location}}</p>
            <a href="event-single.html">
              <h4 class="card-title">{{$event->description}}</h4>
            </a>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>

@endsection