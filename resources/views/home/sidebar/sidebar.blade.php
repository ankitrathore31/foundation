    <header class="transparent">
        <div class="header_wrap container">
            <div class="logo">
                <a href="index.html" title="Ever Care">
                    <img src="images/logo1.png" width="90" height="90" alt="Ever Care">
                </a>
            </div>

            <nav class="justify-content-center">
                <ul>
                    <li><a href="{{ url('/') }}"> Home </a>
                    </li>
                    <li><a href="#"> About Us </a>
                    </li>
                    <li><a href="#"> Activity</a>
                    </li>
                    <li><a href="#"> Project</a>
                    </li>
                    <li><a href=""> Service </a>
                    </li>
                    <li><a href=""> Gallery </a>
                    </li>
                    <li><a href=""> Contact Us </a></li>
                </ul>
            </nav>

            <div class="butttons_group">
                <a class="theme-btn white" data-bs-toggle="modal" data-bs-target="#donationModal" href="#"
                    title="">Donate Now</a>
                {{-- <a class="theme-btn" href="volunteer.html" title="">Volunteer</a> --}}
            </div>
        </div>
    </header><!-- Header -->
    <div class="responsive_menu">
        <div class="logo"> <a href="#" title=""><img
                    src="../../stillidea.net/templates/evercare/assets/images/logo1.html" alt=""></a> </div>


        <div class="butttons_group ms-auto">
            <a class="theme-btn smallest white" data-bs-toggle="modal" data-bs-target="#donationModal" href="#"
                title="">Donate Now</a>
            <button id="hamburger">
                <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                    viewBox="0 0 30 30">
                    <path id="top" class="line"
                        d="M166.18,102.56h25s7.52-.43,5-5.29c-2.89-5.65-8.7,2.07-8.7,2.07L169.84,117"
                        transform="translate(-166.18 -94.7)" />
                    <path id="bottom" class="line"
                        d="M166.18,113.77h25s7.52.43,5,5.29c-2.89,5.64-8.7-2.07-8.7-2.07L169.84,99.31"
                        transform="translate(-166.18 -94.7)" />
                    <line id="middle" class="line" y1="13.48" x2="25" y2="13.48" x1="0" />
                </svg>
            </button>
        </div>


        <div class="responsiveNavigation">
            <ul>
                <li><a href="index.html"> Home </a>
                    <ul>
                        <li><a href="index.html"> Hompage 1 </a></li>
                        <li><a href="index2.html"> Hompage 2 </a></li>
                        <li><a href="index3.html"> Hompage 3 </a></li>
                        <li><a href="#"> Header Styles</a>
                            <ul>
                                <li><a href="index.html"> Style 1 </a></li>
                                <li><a href="index2.html"> Style 2 </a></li>
                                <li><a href="index3.html"> Style 3 </a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li><a href="#"> Pages </a>
                    <ul>
                        <li><a href="about.html">About</a></li>
                        <li><a href="events.html">Events</a></li>
                        <li><a href="eventDetails.html">Event Details</a></li>
                        <li><a href="team.html">Team</a></li>
                        <li><a href="teamDetail.html">Team Detail</a></li>
                        <li><a href="volunteer.html">Become a Volunteer</a></li>
                    </ul>
                </li>
                <li><a href="causes.html"> Causes </a>
                    <ul>
                        <li><a href="causes.html"> Causes Style 1 </a></li>
                        <li><a href="causes2.html"> Causes Style 2 </a></li>
                        <li><a href="causesDetails.html"> Causes Details </a></li>
                    </ul>
                </li>
                <li><a href="blog.html"> Blog </a>
                    <ul>
                        <li><a href="blog.html"> Blog </a></li>
                        <li><a href="blogDetails.html"> Blog Details </a></li>
                    </ul>
                </li>
                <li><a href="contact.html"> Contact Us </a></li>
            </ul>
        </div>
    </div> <!-- Responsive Menu -->
