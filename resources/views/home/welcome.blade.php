@extends('home.layout.master')
@section('content')
    <!-- ✅ CSS to make images same size -->
    <style>
        .carousel-img {
            height: 500px;
            /* You can adjust (e.g., 100vh for fullscreen) */
            object-fit: cover;
            /* Ensures same aspect ratio with crop */
        }
    </style>
    <div class="wrapper">
        <section>
            <div id="homeCarousel" class="carousel slide" data-bs-ride="carousel">

                <!-- Indicators (dots) -->
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#homeCarousel" data-bs-slide-to="0" class="active" aria-current="true"
                        aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#homeCarousel" data-bs-slide-to="1"
                        aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#homeCarousel" data-bs-slide-to="2"
                        aria-label="Slide 3"></button>
                </div>

                <!-- Slides -->
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{ asset('images/featured/slider.jpg') }}" class="d-block w-100 carousel-img"
                            alt="First Slide">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Welcome to Dayaram Foundation</h5>
                            <p>Empowering Communities, Changing Lives</p>
                        </div>
                    </div>

                    <div class="carousel-item">
                        <img src="{{ asset('images/featured/slider2.jpg') }}" class="d-block w-100 carousel-img"
                            alt="Second Slide">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Our Mission</h5>
                            <p>Making a difference through service and support</p>
                        </div>
                    </div>

                    <div class="carousel-item">
                        <img src="{{ asset('images/featured/slider3.jpg') }}" class="d-block w-100 carousel-img"
                            alt="Third Slide">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Join Us</h5>
                            <p>Together we can change lives</p>
                        </div>
                    </div>
                </div>

                <!-- Controls -->
                <button class="carousel-control-prev" type="button" data-bs-target="#homeCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#homeCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>

            </div>
        </section>

        <section class="py-5" style="margin-top: 55px !important;">
            <div class="container">
                <!-- Section Title -->
                <div class="text-center mb-5">
                    <i>Foundation</i>
                    <h2 class="fw-bold">Appeals & Donations</h2>
                </div>

                <!-- Bootstrap Carousel -->
                <div id="donationCarousel" class="carousel slide" data-bs-ride="carousel">

                    <!-- Indicators -->
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#donationCarousel" data-bs-slide-to="0" class="active"
                            aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#donationCarousel" data-bs-slide-to="1"
                            aria-label="Slide 2"></button>
                    </div>

                    <!-- Carousel Items -->
                    <div class="carousel-inner">

                        <!-- First Slide (3 items) -->
                        <div class="carousel-item active">
                            <div class="row g-4">
                                <div class="col-lg-4 col-md-6">
                                    <div class="card h-100 shadow">
                                        <img src="{{ asset('images/causes/1.jpg') }}" class="card-img-top"
                                            alt="Contribute for food hunger">
                                        <div class="card-body">
                                            <h5 class="card-title">Contribute for Food Hunger</h5>
                                            <p class="card-text">If you can't feed a hundred people, then feed just one.</p>
                                            <div class="d-flex justify-content-between small mb-2">
                                                <span><strong>Achieved:</strong> $20,000</span>
                                                <span><strong>Target:</strong> $75,000</span>
                                            </div>
                                            <div class="progress mb-3">
                                                <div class="progress-bar bg-success" role="progressbar" style="width: 35%;"
                                                    aria-valuenow="35" aria-valuemin="0" aria-valuemax="100">35%</div>
                                            </div>
                                            <a href="causesDetails.html" class="btn btn-outline-primary btn-sm">See
                                                Details</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-6">
                                    <div class="card h-100 shadow">
                                        <img src="{{ asset('images/causes/2.jpg') }}" class="card-img-top"
                                            alt="Contribute to spread Education">
                                        <div class="card-body">
                                            <h5 class="card-title">Contribute to Spread Education</h5>
                                            <p class="card-text">Support education for a brighter future.</p>
                                            <div class="d-flex justify-content-between small mb-2">
                                                <span><strong>Achieved:</strong> $20,000</span>
                                                <span><strong>Target:</strong> $75,000</span>
                                            </div>
                                            <div class="progress mb-3">
                                                <div class="progress-bar bg-info" role="progressbar" style="width: 56%;"
                                                    aria-valuenow="56" aria-valuemin="0" aria-valuemax="100">56%</div>
                                            </div>
                                            <a href="causesDetails.html" class="btn btn-outline-primary btn-sm">See
                                                Details</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-6">
                                    <div class="card h-100 shadow">
                                        <img src="{{ asset('images/causes/3.jpg') }}" class="card-img-top"
                                            alt="Contribute for Shelter">
                                        <div class="card-body">
                                            <h5 class="card-title">Contribute for Shelter</h5>
                                            <p class="card-text">Help us provide homes for those in need.</p>
                                            <div class="d-flex justify-content-between small mb-2">
                                                <span><strong>Achieved:</strong> $20,000</span>
                                                <span><strong>Target:</strong> $75,000</span>
                                            </div>
                                            <div class="progress mb-3">
                                                <div class="progress-bar bg-warning" role="progressbar"
                                                    style="width: 27%;" aria-valuenow="27" aria-valuemin="0"
                                                    aria-valuemax="100">27%</div>
                                            </div>
                                            <a href="causesDetails.html" class="btn btn-outline-primary btn-sm">See
                                                Details</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Second Slide (next 3 items or duplicates) -->
                        <div class="carousel-item">
                            <div class="row g-4">
                                <div class="col-lg-4 col-md-6">
                                    <div class="card h-100 shadow">
                                        <img src="{{ asset('images/causes/2.jpg') }}" class="card-img-top"
                                            alt="Education">
                                        <div class="card-body">
                                            <h5 class="card-title">Support Education Again</h5>
                                            <p class="card-text">Every child deserves to learn.</p>
                                            <div class="d-flex justify-content-between small mb-2">
                                                <span><strong>Achieved:</strong> $20,000</span>
                                                <span><strong>Target:</strong> $75,000</span>
                                            </div>
                                            <div class="progress mb-3">
                                                <div class="progress-bar bg-danger" role="progressbar"
                                                    style="width: 78%;" aria-valuenow="78" aria-valuemin="0"
                                                    aria-valuemax="100">78%</div>
                                            </div>
                                            <a href="causesDetails.html" class="btn btn-outline-primary btn-sm">See
                                                Details</a>
                                        </div>
                                    </div>
                                </div>

                                <!-- You can add 2 more cards here if you want -->
                            </div>
                        </div>

                    </div>

                    <!-- Controls -->
                    <button class="carousel-control-prev" type="button" data-bs-target="#donationCarousel"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#donationCarousel"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>

                </div>
            </div>
        </section>

        <section class="py-5 bg-light">
            <div class="container">
                <div class="row align-items-center">

                    <!-- Text Content -->
                    <div class="col-lg-7 mb-4 mb-lg-0">
                        <h3>
                            Together with <strong>Dayaram Foundation</strong>, We Strive for
                            <strong>Education</strong> and <strong>Healthcare</strong> for All
                        </h3>
                        <p>
                            Dayaram Foundation is dedicated to creating opportunities for every child and family by
                            providing access to quality education, healthcare, and community support. With your
                            contribution, we can bring hope and build a brighter future.
                        </p>
                        <div class="d-flex gap-3">
                            <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#donationModal"
                                href="#" title="Donate">
                                Donate Now
                            </a>
                            <a class="btn btn-dark" href="volunteer.html" title="Volunteer">
                                Volunteer
                            </a>
                        </div>
                    </div>

                    <!-- Image -->
                    <div class="col-lg-5 text-center">
                        <img src="images/featured/appeal.jpg" alt="Dayaram Foundation - Education and Healthcare Support"
                            class="img-fluid rounded shadow">
                    </div>
                </div>
            </div>
        </section>

        <section class="py-5 text-center">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-10">

                        <h2 class="mb-4">
                            Just A <strong>Little Support</strong> Can Transform Their <strong>Future</strong>
                        </h2>

                        <p class="mb-4 text-muted">
                            Dayaram Foundation works to bring hope through education, healthcare, and community
                            support. Together, we can create opportunities and make lasting changes in the lives
                            of underprivileged children and families.
                        </p>

                        <a href="volunteer.html" class="btn btn-success btn-lg" title="Join Campaign">
                            Join Our Campaign
                        </a>

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

        <section class="py-5" style="margin-top:55px;">
            <div class="container text-center">

                <!-- Section Title -->
                <div class="mb-5">
                    <span class="text-uppercase text-muted d-block">Service</span>
                    <h2>Our <strong>Service</strong></h2>
                </div>

                <div class="row g-4">

                    <!-- Service 1 -->
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="card h-100 border-0 shadow-sm">
                            <div class="position-relative">
                                <img src="{{ asset('images/causes/1.jpg') }}" class="card-img-top"
                                    alt="Contribute to spread Education">
                                <a href="causesDetails.html" class="badge bg-primary position-absolute top-0 start-0 m-3">
                                    Free Education
                                </a>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">
                                    <a href="causesDetails.html" class="text-decoration-none text-dark">
                                        Contribute to spread Education
                                    </a>
                                </h5>
                                <p class="card-text text-muted">
                                    Education is the most powerful weapon which you can use to change the world.
                                    Your support can bring knowledge to those in need.
                                </p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <a href="#" class="btn btn-success">Donate Now</a>
                                    <a href="causesDetails.html" class="text-decoration-none">See Details</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Service 2 -->
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="card h-100 border-0 shadow-sm">
                            <div class="position-relative">
                                <img src="images/causes/2.jpg" class="card-img-top" alt="Contribute for food hunger">
                                <a href="causesDetails.html" class="badge bg-primary position-absolute top-0 start-0 m-3">
                                    Food Feeding
                                </a>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">
                                    <a href="causesDetails.html" class="text-decoration-none text-dark">
                                        Contribute for food hunger
                                    </a>
                                </h5>
                                <p class="card-text text-muted">
                                    No one should go to bed hungry. A small contribution from you can provide meals
                                    and hope to those struggling for food.
                                </p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <a href="#" class="btn btn-success">Donate Now</a>
                                    <a href="causesDetails.html" class="text-decoration-none">See Details</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Service 3 -->
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="card h-100 border-0 shadow-sm">
                            <div class="position-relative">
                                <img src="images/causes/2.jpg" class="card-img-top"
                                    alt="Empower Women for a Better Future">
                                <a href="causesDetails.html" class="badge bg-primary position-absolute top-0 start-0 m-3">
                                    Women Empowerment
                                </a>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">
                                    <a href="causesDetails.html" class="text-decoration-none text-dark">
                                        Empower Women for a Better Future
                                    </a>
                                </h5>
                                <p class="card-text text-muted">
                                    Empowering women with education, skills, and opportunities creates stronger families
                                    and communities. Your support helps change lives for generations.
                                </p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <a href="#" class="btn btn-success">Donate Now</a>
                                    <a href="causesDetails.html" class="text-decoration-none">See Details</a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <section class="py-5 bg-light">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-10 text-center">

                        <!-- Section Heading -->
                        <span class="text-uppercase text-muted d-block mb-2">Need Support or Have Any Questions?</span>
                        <h3 class="mb-3">
                            Contact <strong>Dayaram Foundation</strong> Now:
                            <i class="text-success">+91-9927311313</i>
                        </h3>
                        <h2 class="mb-4">Get In Touch With Us</h2>

                        <!-- Contact Form -->
                        <form class="p-4 bg-white rounded shadow-sm">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <input type="text" class="form-control" placeholder="Your Name" required>
                                </div>
                                <div class="col-md-6">
                                    <input type="email" class="form-control" placeholder="Your Email Address" required>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" placeholder="Your Phone Number">
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" placeholder="Subject">
                                </div>
                                <div class="col-12">
                                    <textarea class="form-control" rows="5" placeholder="Your Message"></textarea>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-success btn-lg w-100">
                                        Send Message
                                    </button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </section>

    </div>
@endsection
