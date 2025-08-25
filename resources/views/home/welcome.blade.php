@extends('home.layout.master')
@section('content')
    <div class="themeWrap">

        <section>
            <div class="block p-0">
                <div class="container-fluid p-0">
                    <div class="dark_slider">
                        <img src="{{ asset('images/featured/slider.jpg') }}" alt="">
                    </div>
                </div>
            </div>
        </section>

        <section style="margin-top: 55px !important;">
            <div class="block pt-0 pattern1">
                <div class="container">
                    <div class="double_title">
                        <i>Foundation</i>
                        <h2>Appeals & Donations</h2>
                    </div>

                    <div class="row row-gap-30 ev_slider"
                        data-slider='
                        {"autoplay": false, 
                        "autoplaySpeed" : 2500, 
                        "slidesToScroll": 1, 
                        "arrows": true, 
                        "dots": true, 
                        "slidesToShow": 3}'>

                        <div class="col-lg-4 col-md-12">
                            <div class="evc_cause">
                                <div class="evc_cause_img">
                                    <img src="{{ asset('images/causes/1.jpg') }}"
                                        alt="EverCare - Contribute for food hunger">
                                    <a class="cause_cat" href="causesDetails.html" title="">Food Donate</a>
                                </div>
                                <div class="evc_cause_details">
                                    <h3> <a href="causesDetails.html" title=""> Contribute for food hunger </a></h3>
                                    <p>If you can't feed a hundred people, then feed just one..If you can't . If you can't
                                        feed a hundred people, then feed.</p>
                                    <div class="evc_cause_compare">
                                        <div class="evc_numbers"> <i>Achieved:</i> <span>$20,000</span> </div>
                                        <div class="evc_numbers"> <i>Target:</i> <span>$75,000</span> </div>
                                    </div>
                                    <div class="evc_progress"> <span style="width: 35%" data-progress="35%"> </span> </div>

                                    <a class="seeMore" href="causesDetails.html" title="">See Details</a>
                                </div>
                            </div><!-- Ever Care Cause -->
                        </div>

                        <div class="col-lg-4 col-md-12">
                            <div class="evc_cause">
                                <div class="evc_cause_img">
                                    <img src="images/causes/2.jpg" alt="EverCare - Contribute to spread Education">
                                    <a class="cause_cat" href="causesDetails.html" title="">Food Donate</a>
                                </div>
                                <div class="evc_cause_details">
                                    <h3> <a href="causesDetails.html" title=""> Contribute to spread Education </a>
                                    </h3>
                                    <p>If you can't feed a hundred people, then feed just one..If you can't . If you can't
                                        feed a hundred people, then feed.</p>
                                    <div class="evc_cause_compare">
                                        <div class="evc_numbers"> <i>Achieved:</i> <span>$20,000</span> </div>
                                        <div class="evc_numbers"> <i>Target:</i> <span>$75,000</span> </div>
                                    </div>
                                    <div class="evc_progress"> <span style="width: 56%" data-progress="56%"> </span> </div>

                                    <a class="seeMore" href="causesDetails.html" title="">See Details</a>
                                </div>
                            </div><!-- Ever Care Cause -->
                        </div>

                        <div class="col-lg-4 col-md-12">
                            <div class="evc_cause">
                                <div class="evc_cause_img">
                                    <img src="images/causes/3.jpg" alt="EverCare - Contribute for Shelter">
                                    <a class="cause_cat" href="causesDetails.html" title="">Food Donate</a>
                                </div>
                                <div class="evc_cause_details">
                                    <h3> <a href="causesDetails.html" title=""> Contribute for Shelter </a></h3>
                                    <p>If you can't feed a hundred people, then feed just one..If you can't . If you can't
                                        feed a hundred people, then feed.</p>
                                    <div class="evc_cause_compare">
                                        <div class="evc_numbers"> <i>Achieved:</i> <span>$20,000</span> </div>
                                        <div class="evc_numbers"> <i>Target:</i> <span>$75,000</span> </div>
                                    </div>
                                    <div class="evc_progress"> <span style="width: 27%" data-progress="27%"> </span>
                                    </div>

                                    <a class="seeMore" href="causesDetails.html" title="">See Details</a>
                                </div>
                            </div><!-- Ever Care Cause -->
                        </div>

                        <div class="col-lg-4 col-md-12">
                            <div class="evc_cause">
                                <div class="evc_cause_img">
                                    <img src="images/causes/2.jpg" alt="EverCare - Contribute to spread Education">
                                    <a class="cause_cat" href="causesDetails.html" title="">Food Donate</a>
                                </div>
                                <div class="evc_cause_details">
                                    <h3> <a href="causesDetails.html" title=""> Contribute to spread Education </a>
                                    </h3>
                                    <p>If you can't feed a hundred people, then feed just one..If you can't . If you can't
                                        feed a hundred people, then feed.</p>
                                    <div class="evc_cause_compare">
                                        <div class="evc_numbers"> <i>Achieved:</i> <span>$20,000</span> </div>
                                        <div class="evc_numbers"> <i>Target:</i> <span>$75,000</span> </div>
                                    </div>
                                    <div class="evc_progress"> <span style="width: 78%" data-progress="78%"> </span>
                                    </div>

                                    <a class="seeMore" href="causesDetails.html" title="">See Details</a>
                                </div>
                            </div><!-- Ever Care Cause -->
                        </div>

                    </div>
                </div>
            </div>
        </section>

        <section>
            <div class="block pt-0 pb-0 pattern1 ">
                <div class="container">
                    <div class="evc_appeal ">
                        <div class="evc_appeal_text  ">
                            <h3>Together with <strong>Dayaram Foundation</strong>, We Strive for
                                <strong>Education</strong> and <strong>Healthcare</strong> for All
                            </h3>
                            <p>Dayaram Foundation is dedicated to creating opportunities for every child and family by
                                providing
                                access to quality education, healthcare, and community support. With your contribution, we
                                can
                                bring hope and build a brighter future.</p>
                            <div class="butttons_group">
                                <a class="theme-btn white" data-bs-toggle="modal" data-bs-target="#donationModal"
                                    href="#" title="">Donate Now</a>
                                <a class="theme-btn dark" href="volunteer.html" title="">Volunteer</a>
                            </div>
                        </div>
                        <div class="evc_appeal_img  ">
                            <img class="" src="images/featured/appeal.jpg"
                                alt="Dayaram Foundation - Education and Healthcare Support">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section>
            <div class="block evc_dark bottomPadding_low">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-10 offset-1">
                            <div class="join_compaign">
                                <h2 class="text-white">Just A <strong>Little Support</strong> Can Transform
                                    Their <strong>Future</strong></h2>
                                <p>Dayaram Foundation works to bring hope through education, healthcare, and community
                                    support. Together, we can create opportunities and make lasting changes in the lives
                                    of underprivileged children and families.</p>

                                <a class="theme-btn" href="volunteer.html" title="">Join Our Campaign</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <section>
            <div class="block pattern2 bottomPadding_low topPadding_low light_overlay">
                <div class="container">
                    <div class="evc_title">
                        <span>Founder</span>
                        <h2>Our <strong>Founders</strong></h2>
                    </div>

                    <div class="row row-gap-30">
                        <div class="col-lg-6 col-md-6">
                            <div class="evercare_donor">
                                <div class="donor_img"> <img src="{{ asset('images/team/f.jpeg') }}" alt="">
                                </div>
                                <div class="donor_info">
                                    {{-- <i></i> --}}
                                    <h3>Director & Foundor</h3>
                                    <span>Ishwari Prasad Prajapati</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="evercare_donor">
                                <div class="donor_img"> <img src="{{ asset('images/team/c.jpeg') }}" alt="">
                                </div>
                                <div class="donor_info">
                                    {{-- <i>Socail Help</i> --}}
                                    <h3>CEO</h3>
                                    <span>Himanshu Prajapati</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section style="margin-top: 55px !important;">
            <div class="block pt-0 pattern1">
                <div class="container">
                    <div class="evc_title">
                        <span>Service</span>
                        <h2>Our <strong>Service</strong></h2>
                    </div>

                    <div class="row row-gap-30 ev_slider"
                        data-slider='
                        {"autoplay": false, 
                        "autoplaySpeed" : 2500, 
                        "slidesToScroll": 1, 
                        "arrows": true, 
                        "dots": true, 
                        "slidesToShow": 3}'>

                        <div class="col-lg-4 col-md-12">
                            <div class="evc_cause">
                                <div class="evc_cause_img">
                                    <img src="{{ asset('images/causes/1.jpg') }}"
                                        alt="EverCare - Contribute to spread Education">
                                    <a class="cause_cat" href="causesDetails.html" title="">Free Education</a>
                                </div>
                                <div class="evc_cause_details">
                                    <h3> <a href="causesDetails.html" title=""> Contribute to spread Education </a>
                                    </h3>
                                    <p>Education is the most powerful weapon which you can use to change the world. Your
                                        support can bring knowledge to those in need.</p>
                                    <button>Donate Now</button>

                                    <a class="seeMore" href="causesDetails.html" title="">See Details</a>
                                </div>
                            </div><!-- Ever Care Cause -->
                        </div>

                        <div class="col-lg-4 col-md-12">
                            <div class="evc_cause">
                                <div class="evc_cause_img">
                                    <img src="images/causes/2.jpg" alt="EverCare - Contribute for food hunger">
                                    <a class="cause_cat" href="causesDetails.html" title="">Food Feeding</a>
                                </div>
                                <div class="evc_cause_details">
                                    <h3> <a href="causesDetails.html" title=""> Contribute for food hunger </a></h3>
                                    <p>No one should go to bed hungry. A small contribution from you can provide meals and
                                        hope to those struggling for food.</p>
                                    <button>Donate Now</button>

                                    <a class="seeMore" href="causesDetails.html" title="">See Details</a>
                                </div>
                            </div><!-- Ever Care Cause -->
                        </div>

                        <div class="col-lg-4 col-md-12">
                            <div class="evc_cause">
                                <div class="evc_cause_img">
                                    <img src="images/causes/2.jpg" alt="EverCare - Empower Women for a Better Future">
                                    <a class="cause_cat" href="causesDetails.html" title="">Women Empowerment</a>
                                </div>
                                <div class="evc_cause_details">
                                    <h3> <a href="causesDetails.html" title=""> Empower Women for a Better Future
                                        </a></h3>
                                    <p>Empowering women with education, skills, and opportunities creates stronger families
                                        and communities.
                                        Your support helps change lives for generations.</p>
                                    <button>Donate Now</button>

                                    <a class="seeMore" href="causesDetails.html" title="">See Details</a>
                                </div>
                            </div><!-- Ever Care Cause -->
                        </div>


                    </div>
                </div>
            </div>
        </section>


        <section>
            <div class="block">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-10 offset-1">
                            <div class="subscribe_evercare">
                                <span>Need Support or Have Any Questions?</span>
                                <h3>Contact <strong>Dayaram Foundation</strong> Now: <i> +91-9927311313 </i></h3>
                                <h2>Get In Touch With Us</h2>
                                <form class="subscribeForm">
                                    <input type="text" placeholder="Your Name">
                                    <input type="email" placeholder="Your Email Address">
                                    <input type="text" placeholder="Your Phone Number">
                                    <textarea placeholder="Your Message"></textarea>
                                    <button type="submit">Send Message</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>
@endsection
