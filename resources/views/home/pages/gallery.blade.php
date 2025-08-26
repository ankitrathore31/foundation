@extends('home.layout.master')
@section('content')

<!-- Breadcrumb -->
<nav aria-label="breadcrumb" class="bg-light py-3 mb-4">
  <div class="container">
    <ol class="breadcrumb mb-0">
      <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Gallery</li>
    </ol>
  </div>
</nav>

<!-- Gallery -->
<div class="container mb-5">
  <h2 class="mb-4 text-center"> <strong>Gallery</strong></h2>

  <div class="row g-4">
    @php
      $images = [
        'images/widgets/gallery1.jpg',
        'images/widgets/gallery2.jpg',
        'images/widgets/gallery3.jpg',
        'images/widgets/gallery4.jpg',
        'images/widgets/gallery5.jpg',
        'images/widgets/gallery6.jpg',
      ];
    @endphp

    @foreach($images as $index => $img)
      <div class="col-lg-4 col-md-6 col-sm-12">
        <div class="card shadow-sm border-0">
          <img src="{{ asset($img) }}" 
               class="card-img-top img-fluid gallery-img" 
               alt="Gallery Image {{ $index+1 }}" 
               data-bs-toggle="modal" 
               data-bs-target="#galleryModal{{ $index }}">
        </div>
      </div>

      <!-- Modal -->
      <div class="modal fade" id="galleryModal{{ $index }}" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
          <div class="modal-content bg-transparent border-0">
            <img src="{{ asset($img) }}" class="img-fluid rounded" alt="Gallery Full Image">
          </div>
        </div>
      </div>
    @endforeach
  </div>
</div>

<!-- Custom CSS -->
<style>
  .gallery-img {
    height: 250px; 
    object-fit: cover; 
    cursor: pointer;
    border-radius: 8px;
    transition: transform 0.3s;
  }
  .gallery-img:hover {
    transform: scale(1.05);
  }
</style>

@endsection
