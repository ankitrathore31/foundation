@extends('home.layout.master')
@section('content')
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb" class="bg-light py-3 mb-4">
        <div class="container">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Activities</li>
            </ol>
        </div>
    </nav>

    <!-- Activities Table -->
    <div class="container-fluid mb-5">
        <h2 class="mb-4 text-center">Activities</h2>

        <div class="table-responsive shadow-sm rounded">
            <table class="table table-bordered table-hover align-middle text-center">
                <thead class="table-warning">
                    <tr>
                        <th>Sr. No</th>
                        {{-- <th>Activity</th> --}}
                        <th>Date/Time</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Address</th>
                        <th>Session</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="table-primary">
                        <td>1</td>
                        {{-- <td>Free Education Camp</td> --}}
                        <td>2025-08-20 / 10:00 AM</td>
                        <td><img src="{{ asset('images/causes/1.jpg') }}" width="60" class="rounded"></td>
                        <td>Ishwari P. Prajapati</td>
                        <td>Education</td>
                        <td>Pilibhit, UP</td>
                        <td>Morning</td>
                        <td><a href="#" class="btn btn-sm btn-success">View</a></td>
                    </tr>
                    <tr class="table-success">
                        <td>2</td>
                        {{-- <td>Food Distribution Drive</td> --}}
                        <td>2025-08-22 / 01:00 PM</td>
                        <td><img src="{{ asset('images/causes/2.jpg') }}" width="60" class="rounded"></td>
                        <td>Himanshu Prajapati</td>
                        <td>Food</td>
                        <td>Lucknow, UP</td>
                        <td>Afternoon</td>
                        <td><a href="#" class="btn btn-sm btn-success">View</a></td>
                    </tr>
                    <tr class="table-info">
                        <td>3</td>
                        {{-- <td>Women Empowerment Workshop</td> --}}
                        <td>2025-08-24 / 11:30 AM</td>
                        <td><img src="{{ asset('images/causes/3.jpg') }}" width="60" class="rounded"></td>
                        <td>Anjali Sharma</td>
                        <td>Women</td>
                        <td>Bareilly, UP</td>
                        <td>Midday</td>
                        <td><a href="#" class="btn btn-sm btn-success">View</a></td>
                    </tr>
                    <tr class="table-info">
                        <td>4</td>
                        {{-- <td>Healthcare Awareness Camp</td> --}}
                        <td>2025-08-25 / 09:00 AM</td>
                        <td><img src="{{ asset('images/causes/4.jpg') }}" width="60" class="rounded"></td>
                        <td>Ravi Kumar</td>
                        <td>Healthcare</td>
                        <td>Jangroli Pul, UP</td>
                        <td>Morning</td>
                        <td><a href="#" class="btn btn-sm btn-success">View</a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
