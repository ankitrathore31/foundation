<style>
    .navbar-nav .nav-link {
        color: #ffffff !important;
        font-weight: bold;
    }

    .navbar-nav .nav-link:hover,
    .navbar-nav .nav-link.active {
        color: #f8d210 !important;
    }

    .carousel-img {
        height: 500px;
        /* You can adjust (e.g., 100vh for fullscreen) */
        object-fit: cover;
        /* Ensures same aspect ratio with crop */
    }
</style>
<header class="bg-light border-bottom">
    <div class="container py-2">
        <div class="row align-items-center">

            <!-- Logo -->
            <div class="col-md-2 text-center text-md-start mb-2 mb-md-0">
                <a href="{{ url('/') }}" title="Dayaram Foundation">
                    <img src="{{ asset('images/logo1.png') }}" width="120" height="120" alt="Dayaram Foundation">
                </a>
            </div>

            <!-- Title Section -->
            <div class="col-md-8 text-center text-md-start">
                <h2 class="m-0 text-danger fw-bold ngo-title">
                    DAYARAM CHARITABLE FOUNDATION
                </h2>
                <h6 class="m-0 text-dark fw-bold">Empowering Communities, Changing Lives</h6>
                <h6 class="m-0 text-primary fw-bold">Address: Jangroli Pul Pilibhit UP 262001</h6>
            </div>

            <!-- Donate Button -->
            <div class="col-md-2 text-center text-md-end mt-3 mt-md-0">
                <a class="btn btn-success fw-bold px-4" href="{{ route('donation') }}">
                    Donate Now
                </a>
            </div>

        </div>
    </div>
</header>



<!-- ✅ Responsive Bootstrap Navbar -->
<nav class="navbar navbar-expand-md navbar-dark bg-danger">
    <div class="container">
        <!-- Brand (mobile view only if needed) -->
        <a class="navbar-brand d-md-none fw-bold" href="{{ url('/') }}">Dayaram Charitable Foundation</a>

        <!-- Hamburger Menu -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar"
            aria-controls="mainNavbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Menu Links -->
        <div class="collapse navbar-collapse" id="mainNavbar">
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link active" href="{{ url('/') }}">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('about') }}">About Us</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('activity') }}">Activity</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('project') }}">Project</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('service') }}">Service</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('donation.page') }}">Donation</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('gallery.page') }}">Gallery</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('notice-board') }}">Notice Board</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('contact') }}">Contact Us</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('login.page') }}">Login</a></li>
            </ul>
        </div>
    </div>
</nav>
<!-- Image slider -->
<section>
    <div id="homeCarousel" class="carousel slide" data-bs-ride="carousel">

        <!-- Indicators (dots) -->
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#homeCarousel" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#homeCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#homeCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
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
