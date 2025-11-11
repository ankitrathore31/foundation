@extends('home.layout.master')
@section('content')
    <!-- 1️⃣ Donation Form -->
    <section class="py-5">
        <div class="container">
            <div class="text-center mb-4">
                <h2>Make a <strong>Donation</strong></h2>
                <p class="text-muted">Support Dayaram Foundation by filling the donation form below.</p>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-10">
                    <div class="card shadow-sm border-0">
                        <div class="card-body">
                            <form>
                                <div class="mb-3">
                                    <label class="form-label">Full Name</label>
                                    <input type="text" class="form-control" placeholder="Enter your name">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Email Address</label>
                                    <input type="email" class="form-control" placeholder="Enter your email">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Phone Number</label>
                                    <input type="text" class="form-control" placeholder="Enter your phone number">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Donation Amount</label>
                                    <input type="number" class="form-control" placeholder="Enter amount (INR)">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Message</label>
                                    <textarea class="form-control" rows="4" placeholder="Write a message (optional)"></textarea>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-success px-4">Donate Now</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 2️⃣ Bank / UPI / QR Cards -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="text-center mb-4">
                <h2>Donation <strong>Options</strong></h2>
                <p class="text-muted">Choose your preferred way to donate to Dayaram charitable Foundation.</p>
            </div>

            <div class="row g-4">
                <!-- Bank Details -->
                <div class="col-lg-4 col-md-6">
                    <div class="card h-100 border-0 shadow-sm text-center">
                        <div class="card-body">
                            <i class="fa-solid fa-building-columns fa-2x text-success mb-3"></i>
                            <h5 class="card-title">Bank Transfer</h5>
                            <p class="card-text">
                                <strong>Bank:</strong> State Bank of India <br>
                                <strong>Account No:</strong> 44555708605 <br>
                                <strong>IFSC:</strong> SBIN0001667 <br>
                                <strong>Branch:</strong> ASAM CHAURAHA PILIBHIT
                            </p>
                        </div>
                    </div>
                </div>

                <!-- UPI Details -->
                <div class="col-lg-4 col-md-6">
                    <div class="card h-100 border-0 shadow-sm text-center">
                        <div class="card-body">
                            <i class="fa-solid fa-mobile-screen fa-2x text-primary mb-3"></i>
                            <h5 class="card-title">UPI Payment</h5>
                            <p class="card-text">
                                <strong>UPI ID:</strong> Update Soon <br>
                                <strong>Phone:</strong>
                                <a href="tel:+919927311313" class="text-decoration-none text-dark">
                                    +91 9927311313 (Director & Founder)
                                </a>
                            </p>

                            <!-- Optional: Direct UPI Link (opens payment apps like GPay, PhonePe, Paytm, etc.) -->
                            <a href="#" onclick="alert('Update Soon'); return false;" class="btn btn-primary mt-2">
                                <i class="fa-solid fa-paper-plane me-2"></i> Pay Now
                            </a>

                        </div>
                    </div>
                </div>

                <!-- QR Code -->
                <div class="col-lg-4 col-md-6">
                    <div class="card h-100 border-0 shadow-sm text-center">
                        <div class="card-body">
                            <i class="fa-solid fa-qrcode fa-2x text-danger mb-3"></i>
                            <h5 class="card-title">Scan & Pay</h5>
                            <img src="{{ asset('images/qr.jpeg') }}" alt="QR Code" class="img-fluid mb-3"
                                style="max-width:200px;">
                            <!-- Download QR Code Button -->
                            <a href="{{ asset('images/qr.jpeg') }}" download="Payment-QR.jpeg" class="btn btn-danger">
                                <i class="fa-solid fa-download me-2"></i> Download QR
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- 2️⃣ Bank / UPI / QR Cards -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row g-1">
                <div class="col-lg-12 col-md-12">
                    <div class="card h-100 border-0 shadow-sm text-center">
                        <div class="card-body">
                            <h5 class="card-title">Check Payment</h5>
                            <img src="{{ asset('images/check dayaram.jpeg') }}" alt="QR Code" class="img-fluid mb-3">

                            <!-- Download Button -->
                            <a href="{{ asset('images/check dayaram.jpeg') }}" download class="btn d-block w-25 btn-danger">
                                <i class="fa-solid fa-download me-2"></i> Download
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- 3️⃣ Causes / Donation Services -->
    <section class="py-5">
        <div class="container text-center">

            <!-- Section Title -->
            <div class="mb-5">
                <span class="text-uppercase text-muted d-block">Donation Causes</span>
                <h2>Support Our <strong>Services</strong></h2>
            </div>

            <div class="row g-4">

                <!-- Service 1 -->
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="position-relative">
                            <img src="{{ asset('images/causes/1.jpg') }}" class="card-img-top" alt="Education">
                            <span class="badge bg-primary position-absolute top-0 start-0 m-3">Free Education</span>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Contribute to spread Education</h5>
                            <p class="card-text text-muted">Your support can bring knowledge and opportunities to those in
                                need.</p>
                            <a href="#" class="btn btn-success">Donate Now</a>
                        </div>
                    </div>
                </div>

                <!-- Service 2 -->
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="position-relative">
                            <img src="{{ asset('images/causes/2.jpg') }}" class="card-img-top" alt="Food">
                            <span class="badge bg-primary position-absolute top-0 start-0 m-3">Food Feeding</span>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Contribute for Food Hunger</h5>
                            <p class="card-text text-muted">A small contribution from you can provide meals and hope to
                                many.</p>
                            <a href="#" class="btn btn-success">Donate Now</a>
                        </div>
                    </div>
                </div>

                <!-- Service 3 -->
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="position-relative">
                            <img src="{{ asset('images/causes/3.jpg') }}" class="card-img-top" alt="Women Empowerment">
                            <span class="badge bg-primary position-absolute top-0 start-0 m-3">Women Empowerment</span>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Empower Women for a Better Future</h5>
                            <p class="card-text text-muted">Your support helps women gain education, skills, and
                                opportunities.</p>
                            <a href="#" class="btn btn-success">Donate Now</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
