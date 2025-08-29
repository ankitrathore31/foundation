<header class="bg-light border-bottom">
    <div class="container py-2 d-flex flex-column flex-md-row align-items-center justify-content-between">

        <!-- Logo + Title -->
        <div class="d-flex align-items-center">
            <!-- Logo -->
            <a href="{{ url('/') }}" title="Dayaram Foundation" class="me-5">
                <img src="images/logo1.png" width="120" height="120" alt="Dayaram Foundation">
            </a>

            <!-- Title -->
            <div class="text-start">
                <h2 class="m-0 text-danger fw-bold">DAYARAM CHARITABLE FOUNDATION</h2>
                <h6 class="m-0 text-dark fw-bold">Empowering Communities, Changing Lives</h6>
                <h6 class="m-0 text-primary fw-bold">Address: Jangroli Pul Pilibhit UP 262001</h6>
            </div>
        </div>

        <!-- Donate Button -->
        <div class="mt-3 mt-md-0">
            <a class="btn btn-success fw-bold px-4"
                href="{{route('donation')}}">
                Donate Now
            </a>
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
                <li class="nav-item"><a class="nav-link" href="{{ route('donation') }}">Donation</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('gallery') }}">Gallery</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('notice-board') }}">Notice Board</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('contact') }}">Contact Us</a></li>
                <li class="nav-item"><a class="nav-link" href="{{route('login.page')}}">Login</a></li>
            </ul>
        </div>
    </div>
</nav>
<style>
</style>
