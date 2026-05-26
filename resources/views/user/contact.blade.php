@extends('user.mainsidebar')
@section('userbanner')
<section class="page-title-section overlay" data-background="user/images/backgrounds/page-title.jpg">
  <div class="container">
    <div class="row">
      <div class="col-md-8">
        <ul class="list-inline custom-breadcrumb">
          <li class="list-inline-item"><a class="h2 text-primary font-secondary" href="@@page-link">Contact Us</a></li>
          <li class="list-inline-item text-white h3 font-secondary @@nasted"></li>
        </ul>
        <p class="text-lighten">Do you have other questions? Don't worry, there aren't any dumb questions. Just fill out the form below and we'll get back to you as soon as possible.</p>
      </div>
    </div>
  </div>
</section>
<!-- /page title -->

<!-- contact -->
<section class="section bg-gray">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h2 class="section-title">Contact Us</h2>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-7 mb-4 mb-lg-0">
        <form action="{{route('contactform')}}" method="post">
          @if (session('success'))
            <div class="alert alert-success" role="alert">
  {{session('success')}}
</div>
          @endif
            @csrf
          <input type="text" class="form-control mb-3" id="name" name="name" placeholder="Your Name">
          @error('name')
              <p class="text-warning">{{$message}}</p>
          @enderror
          <input type="email" class="form-control mb-3" id="mail" name="mail" placeholder="Your Email">
           @error('mail')
              <p class="text-warning">{{$message}}</p>
          @enderror
          <input type="text" class="form-control mb-3" id="subject" name="subject" placeholder="Subject">
           @error('subject')
              <p class="text-warning">{{$message}}</p>
          @enderror
          <textarea name="message" id="message" class="form-control mb-3" placeholder="Your Message"></textarea>
           @error('message')
              <p class="text-warning">{{$message}}</p>
          @enderror
          <button type="submit" value="send" class="btn btn-primary">SEND MESSAGE</button>
        </form>
      </div>
      <div class="col-lg-5">
        <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit recusandae voluptates doloremque veniam temporibus porro culpa ipsa, nisi soluta minima saepe laboriosam debitis nesciunt. Dolore, labore. Accusamus nulla sed cum aliquid exercitationem debitis error harum porro maxime quo iusto aliquam dicta modi earum fugiat, vel possimus commodi, deleniti et veniam, fuga ipsum praesentium. Odit unde optio nulla ipsum quae obcaecati! Quod esse natus quibusdam asperiores quam vel, tempore itaque architecto ducimus expedita</p>
        <a href="tel:+8802057843248" class="text-color h5 d-block">923188948228</a>
        <a href="mailto:yourmail@email.com" class="mb-5 text-color h5 d-block">madsyco2@gmail.com</a>
        <p>Street 6 <br>Mehran Town Korangi Karachi</p>
      </div>
    </div>
  </div>
</section>
<!-- /contact -->

<!-- gmap -->
<section class="section pt-0">

  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7241.0962668431!2d67.11207104082455!3d24.845122047639244!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3eb33bea36632ea5%3A0x9a46cc8ddbf2b5fd!2sMehran%20Town%20Korangi%2C%20Karachi%2C%20Pakistan!5e0!3m2!1sen!2s!4v1772629862253!5m2!1sen!2s" width="100%" height="500" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</section>
<!-- /gmap -->

@endsection