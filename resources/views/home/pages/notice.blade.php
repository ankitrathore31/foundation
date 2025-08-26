@extends('home.layout.master')
@section('content')

<!-- Breadcrumb -->
<nav aria-label="breadcrumb" class="bg-light py-3 mb-4 shadow-sm">
  <div class="container">
    <ol class="breadcrumb mb-0">
      <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Notices</li>
    </ol>
  </div>
</nav>

<!-- Notices Section -->
<div class="container mb-5">
  <h2 class="mb-4 text-center"><strong>Notices</strong></h2>

  <div class="list-group">

    <!-- Notice 1 -->
    <div class="list-group-item list-group-item-action flex-column align-items-start mb-3 shadow-sm rounded">
      <div class="d-flex w-100 justify-content-between">
        <h5 class="mb-1 text-primary">Annual General Meeting</h5>
        <small class="text-muted">24 Aug 2025, 10:00 AM</small>
      </div>
      <p class="mb-1">
        We are pleased to announce our Annual General Meeting where we will discuss upcoming initiatives,
        achievements, and future plans. All members are invited to attend.
      </p>
    </div>

    <!-- Notice 2 -->
    <div class="list-group-item list-group-item-action flex-column align-items-start mb-3 shadow-sm rounded">
      <div class="d-flex w-100 justify-content-between">
        <h5 class="mb-1 text-success">Health Camp Notice</h5>
        <small class="text-muted">15 Sep 2025, 09:00 AM</small>
      </div>
      <p class="mb-1">
        A free health check-up camp will be organized for underprivileged families. Services include
        general check-ups, medicines, and awareness sessions.
      </p>
    </div>

    <!-- Notice 3 -->
    <div class="list-group-item list-group-item-action flex-column align-items-start mb-3 shadow-sm rounded">
      <div class="d-flex w-100 justify-content-between">
        <h5 class="mb-1 text-danger">Educational Scholarship</h5>
        <small class="text-muted">01 Oct 2025, 02:00 PM</small>
      </div>
      <p class="mb-1">
        Applications are invited for the Dayaram Foundation Educational Scholarship 2025. Eligible students
        are encouraged to apply before the deadline.
      </p>
    </div>

  </div>
</div>

@endsection
