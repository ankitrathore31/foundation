@extends('home.layout.master')
@section('content')

<!-- Breadcrumb -->
<nav aria-label="breadcrumb" class="bg-light py-3 mb-4 shadow-sm">
  <div class="container">
    <ol class="breadcrumb mb-0">
      <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Contact</li>
    </ol>
  </div>
</nav>

<!-- Contact Section -->
<div class="container mb-5">
  <h2 class="mb-4 text-center"> - Get in Touch with - </h2>

  <div class="row g-4">
    
    <!-- Map -->
    <div class="col-lg-6">
      <div class="shadow-sm rounded overflow-hidden">
        <iframe 
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14235.5045633943!2d79.792049!3d28.631176!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2z!5e0!3m2!1sen!2sin!4v1631699631423!5m2!1sen!2sin" 
          width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy">
        </iframe>
      </div>
    </div>

    <!-- Contact Info -->
    <div class="col-lg-6">
      <div class="card shadow-sm p-4 h-100">
        <h4 class="mb-3">Contact Information</h4>
        <ul class="list-unstyled mb-4">
          <li class="mb-2"><i class="fa fa-map-marker-alt text-primary"></i> Jangroli Pul, Rooppur Kamalu, Pilibhit, UP 262001</li>
          <li class="mb-2"><i class="fa fa-phone text-success"></i> +91-9927311313</li>
          <li><i class="fa fa-envelope text-danger"></i> dayaramfoundation2002@gmail.com</li>
        </ul>

        <!-- Social Media -->
        <div class="mb-2">
          <a href="#" class="btn btn-outline-primary btn-sm me-2"><i class="fab fa-facebook-f"></i></a>
          <a href="#" class="btn btn-outline-info btn-sm me-2"><i class="fab fa-twitter"></i></a>
          <a href="#" class="btn btn-outline-danger btn-sm me-2"><i class="fab fa-youtube"></i></a>
          <a href="#" class="btn btn-outline-primary btn-sm"><i class="fab fa-linkedin-in"></i></a>
        </div>
      </div>
    </div>

  </div>

  <!-- Contact Form (separate row) -->
  <div class="row mt-5">
    <div class="col-lg-12 mx-auto">
      <div class="card shadow-sm p-4">
        <h4 class="mb-3 text-center">Send Us a Message</h4>
        <form>
          <div class="row g-3">
            <div class="col-md-6">
              <input type="text" class="form-control" placeholder="Your Name" required>
            </div>
            <div class="col-md-6">
              <input type="email" class="form-control" placeholder="Your Email" required>
            </div>
            <div class="col-md-6">
              <input type="text" class="form-control" placeholder="Your Phone Number">
            </div>
            <div class="col-md-6">
              <input type="text" class="form-control" placeholder="Subject">
            </div>
            <div class="col-12">
              <textarea class="form-control" rows="4" placeholder="Your Message" required></textarea>
            </div>
          </div>
          <button type="submit" class="btn btn-primary w-100 mt-3">Send Message</button>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection
