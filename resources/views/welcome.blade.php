<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
    {{-- Quynh them start --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&family=EB+Garamond:ital,wght@0,400..800;1,400..800&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Roboto+Condensed:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    {{-- slider start --}}
    <link rel="stylesheet" type="text/css" href="slick/slick.css" />
    <link rel="stylesheet" type="text/css" href="slick/slick-theme.css" />
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    {{-- slider end --}}
    <style>
        @import url('https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&display=swap');
    </style>
    <!-- Libraries Stylesheet -->
    <link href="{{ asset('homepage/lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('homepage/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('homepage/css/bootstrap.min.css') }}" rel="stylesheet">

    <link href="{{ asset('homepage/css/bootstrap.min.css') }}" rel="stylesheet">
    {{-- Quynh them end --}}
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('welcome_assets/style.css') }}">
    <link rel="stylesheet" href="{{ asset('homepage/css/style1.css') }}">
    <link rel="stylesheet" href="{{ asset('homepage/css/style2.css') }}">
    <title>Feelance</title>
</head>

<body>
    {{-- Header --}}
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <a href="{{ url('/') }}" class="navbar-brand d-flex mx-auto mx-lg-0">
                <img src="{{ asset('welcome_assets/images/logo_name.png') }}" alt="">
            </a>

            <div class="collapse navbar-collapse" id="navbarNav" style="margin-top: 10px;">
                <ul class="navbar-nav ms-lg-2">
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="#" id="navbarDropdown" role="button">
                            Hire freelancers
                        </a>
                        <ul class="dropdown-menu main-dropdown">
                            <li class="dropdown-item">
                                <a href="" class="d-flex" style="align-items: center;">
                                    <i class="fa-solid fa-head-side-virus"></i>
                                    <div class="dropdown-item-box">
                                        <div class="type">By skills</div>
                                        <p class="type-desc">Looking for a freelancer with a specific skill? Start here.
                                        </p>
                                    </div>
                                </a>
                                <!-- Sub-menu -->
                                <ul class="sub-menu">
                                    <li><a href="#">Web developers</a></li>
                                    <li><a href="#">Writers</a></li>
                                    <li><a href="#">Marketing specialists</a></li>
                                    <li><a href="#">SEO specialists</a></li>
                                    <li><a href="#">Data entry clerks</a></li>
                                    <li><a href="#">Virtual assistants</a></li>
                                    <li><a href="#">Translators</a></li>
                                    <li><a href="#">More ></a></li>
                                </ul>
                            </li>
                            <li class="dropdown-item">
                                <a href="" class="d-flex" style="align-items: center;">
                                    <i class="fa-solid fa-location-dot"></i>
                                    <div class="dropdown-item-box">
                                        <div class="type">By location</div>
                                        <p class="type-desc">Search for freelancers based on their location and
                                            timezone.</p>
                                    </div>
                                </a>
                                <!-- Sub-menu -->
                                <ul class="sub-menu">
                                    <li><a href="#">United States</a></li>
                                    <li><a href="#">United Kingdom</a></li>
                                    <li><a href="#">Canada</a></li>
                                    <li><a href="#">India</a></li>
                                    <li><a href="#">Vietnam</a></li>
                                    <li><a href="#">China</a></li>
                                    <li><a href="#">More ></a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="#" id="navbarDropdown" role="button">
                            Find jobs
                        </a>
                        <ul class="dropdown-menu main-dropdown">
                            <li class="dropdown-item">
                                <a href="" class="d-flex" style="align-items: center;">
                                    <i class="fa-solid fa-head-side-virus"></i>
                                    <div class="dropdown-item-box">
                                        <div class="type">By skills</div>
                                        <p class="type-desc">Search for work that requires a particular skill.</p>
                                    </div>
                                </a>
                                <!-- Sub-menu -->
                                <ul class="sub-menu">
                                    <li><a href="#">Web developers</a></li>
                                    <li><a href="#">Writers</a></li>
                                    <li><a href="#">Marketing specialists</a></li>
                                    <li><a href="#">SEO specialists</a></li>
                                    <li><a href="#">Data entry clerks</a></li>
                                    <li><a href="#">Virtual assistants</a></li>
                                    <li><a href="#">Translators</a></li>
                                    <li><a href="#">More ></a></li>
                                </ul>
                            </li>
                            <li class="dropdown-item">
                                <a href="" class="d-flex" style="align-items: center;">
                                    <i class="fa-solid fa-globe"></i>
                                    <div class="dropdown-item-box">
                                        <div class="type">By Language</div>
                                        <p class="type-desc">Find projects that are in your language.</p>
                                    </div>
                                </a>
                                <!-- Sub-menu -->
                                <ul class="sub-menu">
                                    <li><a href="#">Jobs in English</a></li>
                                    <li><a href="#">Jobs in Spanish</a></li>
                                    <li><a href="#">Jobs in Portugese</a></li>
                                    <li><a href="#">Jobs in French</a></li>
                                    <li><a href="#">Jobs in German</a></li>
                                    <li><a href="#">Jobs in Hindi</a></li>
                                    <li><a href="#">Jobs in Chinese</a></li>
                                    <li><a href="#">More ></a></li>
                                </ul>
                            </li>
                            <li class="dropdown-item">
                                <a href="" class="d-flex" style="align-items: center;">
                                    <i class="fa-solid fa-bookmark"></i>
                                    <div class="dropdown-item-box">
                                        <div class="type">Featured Jobs</div>
                                        <p class="type-desc">Explore our current list of excited top featured jobs.</p>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>

            <div class="d-lg-flex align-items-center d-none ms-auto" style="margin-top: 10px;">
                <ul class="navbar-nav ms-lg-2">
                    <li class="nav-item">
                        <a class="nav-link click-scroll" href="">Log in</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link click-scroll" href="">Sign up</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link start-button" href="">Start now</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        @yield('main-content')
    </div>

    {{-- Footer start --}}
    <footer class="footer text-center text-lg-start text-white" style="background-color: #04113a">
        <!-- Grid container -->
        <div class="container py-4">
            <!-- Section: Links -->
            <section class="">
                <!--Grid row-->
                <div class="row">
                    <!-- Grid column -->
                    <div class="logo-grap col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
                        {{-- <h6 class="text-uppercase mb-4 font-weight-bold text-white">
                            Company name
                        </h6>
                        <p>
                            Here you can use rows and columns to organize your footer
                            content. Lorem ipsum dolor sit amet, consectetur adipisicing
                            elit.
                        </p> --}}
                        <img class="footer-logo" src="{{ asset('welcome_assets/images/Logo_white.png') }}"
                            alt="">
                        {{-- <span class="footer-logoname">felance</span> --}}
                    </div>
                    <!-- Grid column -->

                    {{-- <hr class="w-100 clearfix d-md-none" /> --}}

                    <!-- Grid column -->
                    <div class="quick-links col-md-2 col-lg-2 col-xl-2 mx-auto mt-3">
                        <h6 class="mb-4 font-weight-bold text-white">Quick Links</h6>
                        <p>
                            <a class="text-gray">Homepage</a>
                        </p>
                        <p>
                            <a class="text-gray">Search job</a>
                        </p>
                        <p>
                            <a class="text-gray">Manage account</a>
                        </p>
                        <p>
                            <a class="text-gray">Find freelancers</a>
                        </p>
                    </div>
                    <!-- Grid column -->

                    {{-- <hr class="w-100 clearfix d-md-none" /> --}}

                    <!-- Grid column -->
                    {{-- <hr class="w-100 clearfix d-md-none" /> --}}

                    <!-- Grid column -->
                    <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">
                        <h6 class=" mb-4 font-weight-bold text-white">Contact</h6>
                        <p clas="text-gray"><i class="fas fa-home mr-3 text-gray"></i> Da Nang, Viet Nam</p>
                        <p clas="text-gray"><i class="fas fa-envelope mr-3 text-gray"></i> 23ai@vku.udn.vn</p>
                        <p clas="text-gray"><i class="fas fa-phone mr-3 text-gray"></i> + 01 234 567 88</p>
                        <p clas="text-gray"><i class="fas fa-print mr-3 text-gray"></i> + 01 234 567 89</p>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="footer-icon col-md-3 col-lg-2 col-xl-2 mx-auto mt-3">
                        <h6 class="mb-4 font-weight-bold text-white">Follow us</h6>

                        <!-- Facebook -->
                        <a class="btn btn-primary btn-floating m-1" style="background-color: #3b5998" href="#!"
                            role="button"><i class="fab fa-facebook-f"></i></a>

                        <!-- Twitter -->
                        <a class="btn btn-primary btn-floating m-1" style="background-color: #55acee" href="#!"
                            role="button"><i class="fab fa-twitter"></i></a>

                        <!-- Google -->
                        <a class="btn btn-primary btn-floating m-1" style="background-color: #dd4b39" href="#!"
                            role="button"><i class="fab fa-google"></i></a>

                        <!-- Instagram -->
                        <a class="btn btn-primary btn-floating m-1" style="background-color: #ac2bac" href="#!"
                            role="button"><i class="fab fa-instagram"></i></a>

                        <!-- Linkedin -->
                        <a class="btn btn-primary btn-floating m-1" style="background-color: #0082ca" href="#!"
                            role="button"><i class="fab fa-linkedin-in"></i></a>
                        <!-- Github -->
                        <a class="btn btn-primary btn-floating m-1" style="background-color: #333333" href="#!"
                            role="button"><i class="fab fa-github"></i></a>
                    </div>
                </div>
                <!--Grid row-->
            </section>
            <!-- Section: Links -->
        </div>
        <!-- Grid container -->

        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
            © 2024 Copyright:
            <a class="text-white" href="https://mdbootstrap.com/">felance.com</a>
        </div>
        <!-- Copyright -->
    </footer>
    {{-- Footer end --}}
    <script src="{{ asset('homepage/js/script.js') }}"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="https://kit.fontawesome.com/406c9ab88b.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
