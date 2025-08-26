@extends('home.layout.master')
@section('content')

<!-- Breadcrumb -->
<nav aria-label="breadcrumb" class="bg-light py-3 mb-4">
  <div class="container">
    <ol class="breadcrumb mb-0">
      <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Projects</li>
    </ol>
  </div>
</nav>

<!-- Projects Table -->
<div class="container-fluid mb-5">
  <h2 class="mb-4 text-center"><strong>Projects</strong></h2>

  <div class="table-responsive">
    <table class="table table-bordered table-hover text-center align-middle">
      <thead class="table-primary">
        <tr>
          <th>Sr No</th>
          <th>Project</th>
          <th>Image</th>
          <th>Category</th>
          <th>Address</th>
          <th>Description</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <tr class="table-light">
          <td>1</td>
          <td>Rural Education Project</td>
          <td><img src="{{ asset('images/projects/1.jpg') }}" alt="Education Project" width="90" height="70" style="object-fit: cover;"></td>
          <td>Education</td>
          <td>Pilibhit, UP</td>
          <td>Setting up learning centers in rural villages to provide access to quality education for children.</td>
          <td>
            <a href="#" class="btn btn-sm btn-primary">View</a>
            <a href="#" class="btn btn-sm btn-success">Donate</a>
          </td>
        </tr>
        <tr class="table-warning">
          <td>2</td>
          <td>Community Health Camps</td>
          <td><img src="{{ asset('images/projects/2.jpg') }}" alt="Health Project" width="90" height="70" style="object-fit: cover;"></td>
          <td>Healthcare</td>
          <td>Lucknow, UP</td>
          <td>Organizing regular health checkups, medical aid, and awareness programs for underserved communities.</td>
          <td>
            <a href="#" class="btn btn-sm btn-primary">View</a>
            <a href="#" class="btn btn-sm btn-success">Donate</a>
          </td>
        </tr>
        <tr class="table-info">
          <td>3</td>
          <td>Women Skill Development</td>
          <td><img src="{{ asset('images/projects/3.jpg') }}" alt="Women Project" width="90" height="70" style="object-fit: cover;"></td>
          <td>Empowerment</td>
          <td>Bareilly, UP</td>
          <td>Providing vocational training programs to women for financial independence and self-reliance.</td>
          <td>
            <a href="#" class="btn btn-sm btn-primary">View</a>
            <a href="#" class="btn btn-sm btn-success">Donate</a>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</div>

@endsection
