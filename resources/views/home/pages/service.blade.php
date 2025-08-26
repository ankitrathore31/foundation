@extends('home.layout.master')
@section('content')

<!-- Breadcrumb -->
<nav aria-label="breadcrumb" class="bg-light py-3 mb-4">
  <div class="container">
    <ol class="breadcrumb mb-0">
      <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Services</li>
    </ol>
  </div>
</nav>

<!-- Service Table -->
<div class="container-fluid mb-5">
  <h2 class="mb-4 text-center"><strong>Services</strong></h2>

  <div class="table-responsive">
    <table class="table table-bordered table-hover text-center align-middle">
      <thead class="table-success">
        <tr>
          <th>Sr No</th>
          <th>Service</th>
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
          <td>Free Education Program</td>
          <td><img src="{{ asset('images/causes/1.jpg') }}" alt="Education" width="90" height="70" style="object-fit: cover;"></td>
          <td>Education</td>
          <td>Pilibhit, UP</td>
          <td>Providing free education to underprivileged children, helping them build a brighter future.</td>
          <td>
            <a href="#" class="btn btn-sm btn-primary">View</a>
            <a href="#" class="btn btn-sm btn-success">Donate</a>
          </td>
        </tr>
        <tr class="table-warning">
          <td>2</td>
          <td>Food Distribution Drive</td>
          <td><img src="{{ asset('images/causes/2.jpg') }}" alt="Food" width="90" height="70" style="object-fit: cover;"></td>
          <td>Food & Nutrition</td>
          <td>Lucknow, UP</td>
          <td>Regularly distributing nutritious food to families struggling with hunger and malnutrition.</td>
          <td>
            <a href="#" class="btn btn-sm btn-primary">View</a>
            <a href="#" class="btn btn-sm btn-success">Donate</a>
          </td>
        </tr>
        <tr class="table-info">
          <td>3</td>
          <td>Women Empowerment Workshop</td>
          <td><img src="{{ asset('images/causes/3.jpg') }}" alt="Women Empowerment" width="90" height="70" style="object-fit: cover;"></td>
          <td>Empowerment</td>
          <td>Bareilly, UP</td>
          <td>Workshops and training programs for women to gain skills, confidence, and independence.</td>
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
