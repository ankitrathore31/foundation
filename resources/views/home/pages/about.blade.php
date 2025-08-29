@extends('home.layout.master')
@section('content')
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row align-items-center g-4">

                <!-- Image -->
                <div class="col-lg-6 col-sm-12 text-center">
                    <img src="images/featured/about.png" alt="About Dayaram Foundation"
                        class="img-fluid rounded shadow-sm">
                </div>

                <!-- Content -->
                <div class="col-lg-6 col-sm-12">
                    <small class="text-uppercase text-success d-block mb-2">Welcome to Dayaram Charitable Foundation</small>

                    <h3 class="mb-3">
                        Get the facts about <strong>safe water</strong> and how it <strong>affects</strong>
                        children living in <strong>poverty.</strong>
                    </h3>

                    <p class="text-muted">
                        Dayaram Charitable Foundation was established in 1990 and began to operate internationally in 2010.
                        Even today, millions of people drink dirty water. Learn how access to clean water can
                        improve health and boost local economies.
                    </p>

                    <!-- Counters -->
                    <div class="row text-center mb-4 mt-3">
                        <div class="col-6 col-md-3">
                            <h4 class="fw-bold">126</h4>
                            <small class="text-muted">Primary Schools</small>
                        </div>
                        <div class="col-6 col-md-3">
                            <h4 class="fw-bold">19</h4>
                            <small class="text-muted">Hospitals</small>
                        </div>
                        <div class="col-6 col-md-3">
                            <h4 class="fw-bold">50</h4>
                            <small class="text-muted">Volunteers</small>
                        </div>
                        <div class="col-6 col-md-3">
                            <h4 class="fw-bold">4</h4>
                            <small class="text-muted">Awards</small>
                        </div>
                    </div>

                    <!-- Button -->
                    <a href="#" class="btn btn-success btn-lg">Read More</a>
                </div>

            </div>
        </div>
    </section>

    <section class="py-5 bg-light">
        <div class="container text-center">

            <!-- Section Title -->
            <div class="mb-5">
                <span class="text-uppercase text-muted d-block">Founder</span>
                <h2>Our <strong>Founders</strong></h2>
            </div>

            <div class="row g-4 justify-content-center">

                <!-- Founder 1 -->
                <div class="col-lg-5 col-md-6">
                    <div class="card h-100 border rounded shadow-sm">
                        <div class="p-3">
                            <img src="{{ asset('images/team/f.jpeg') }}" class="img-fluid rounded"
                                alt="Founder Ishwari Prasad Prajapati"
                                style="width:100%; height:300px; object-fit:contain; background:#f8f9fa;">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Director & Founder</h5>
                            <p class="fw-bold mb-2">Ishwari Prasad Prajapati</p>
                            <p class="card-text text-muted">
                                With a vision to empower underprivileged communities, he laid the foundation
                                of Dayaram Foundation, focusing on education and healthcare initiatives.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Founder 2 -->
                <div class="col-lg-5 col-md-6">
                    <div class="card h-100 border rounded shadow-sm">
                        <div class="p-3">
                            <img src="{{ asset('images/team/c.jpeg') }}" class="img-fluid rounded"
                                alt="CEO Himanshu Prajapati"
                                style="width:100%; height:300px; object-fit:contain; background:#f8f9fa;">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">CEO</h5>
                            <p class="fw-bold mb-2">Himanshu Prajapati</p>
                            <p class="card-text text-muted">
                                Leading the organization with innovation and dedication, he works to expand
                                its reach and impact, ensuring sustainable growth and social support.
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
