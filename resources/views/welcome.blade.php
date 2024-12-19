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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&family=EB+Garamond:ital,wght@0,400..800;1,400..800&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Roboto+Condensed:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="slick/slick.css" />
    <link rel="stylesheet" type="text/css" href="slick/slick-theme.css" />
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <style>
        @import url('https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&display=swap');
    </style>
    <link href="{{ asset('homepage/lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('homepage/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

    <link href="{{ asset('homepage/css/bootstrap.min.css') }}" rel="stylesheet">

    <link href="{{ asset('homepage/css/bootstrap.min.css') }}" rel="stylesheet">
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
            {{-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button> --}}

            <a href="{{ url('/') }}" class="navbar-brand d-flex mx-auto mx-lg-0">
                <img src="{{ asset('welcome_assets/images/logo_name.png') }}" alt="">
            </a>

            {{-- <div class="collapse navbar-collapse" id="navbarNav" style="margin-top: 10px;">
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
                            </li>
                            <li class="dropdown-item">
                                <a href="" class="d-flex" style="align-items: center;">
                                    <i class="fa-solid fa-globe"></i>
                                    <div class="dropdown-item-box">
                                        <div class="type">By Language</div>
                                        <p class="type-desc">Find projects that are in your language.</p>
                                    </div>
                                </a>
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
            </div> --}}

            <div class="d-lg-flex align-items-center d-none ms-auto" style="margin-top: 10px;">
                <ul class="navbar-nav ms-lg-2">
                    <li class="nav-item">
                        <a class="nav-link click-scroll" href="{{ route('login') }}">Log in</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link click-scroll" href="{{ route('register') }}">Sign up</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link start-button" href="{{ route('register') }}">Start now</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="hero">
            <div class="hero-content">
                <h1>Find Your Next<br> <span class="highlight">Freelance</span> Opportunity</h1>
                <p>Join thousands of freelancers connecting with <span class="sub-highlight">top companies</span> for
                    remote and
                    flexible jobs</p>
                <div class="search-bar">
                    <span class="icon-search">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </span>
                    <input type="text" placeholder="Job title, keywords,...">
                    <button>
                        <a href="{{ route('findJob') }}" style="color: #fff">Find job</a>
                    </button>
                </div>
            </div>
            <div class="hero-image">
                <img src="{{ asset('homepage/images/background_hero.svg') }}" alt="Freelancer illustration"
                    style="transform: scaleX(-1); " class="image_hero">
                <img src="https://technowich.com/wp-content/uploads/2020/07/lightbulb.svg" class="image_idea">
            </div>
        </div>
        {{-- Slide show start --}}
        <div class="slider_brand">
            <div class="logo">
                <div class="image">
                    <img src="https://felan.ricetheme.com/wp-content/uploads/2024/06/Company-logo-8.svg">
                </div>
            </div>
            <div class="logo">
                <div class="image">
                    <img src="https://felan.ricetheme.com/wp-content/uploads/2024/06/Company-logo-1.svg">
                </div>
            </div>
            <div class="logo">
                <div class="image">
                    <img src="https://felan.ricetheme.com/wp-content/uploads/2024/06/Company-logo-2.svg">
                </div>
            </div>
            <div class="logo">
                <div class="image">
                    <img src="https://felan.ricetheme.com/wp-content/uploads/2024/06/Company-logo-3.svg">
                </div>
            </div>
            <div class="logo">
                <div class="image">
                    <img src="https://felan.ricetheme.com/wp-content/uploads/2024/06/Company-logo-4.svg">
                </div>
            </div>
            <div class="logo">
                <div class="image">
                    <img src="https://felan.ricetheme.com/wp-content/uploads/2024/06/Company-logo-5.svg">
                </div>
            </div>
            <div class="logo">
                <div class="image">
                    <img src="https://felan.ricetheme.com/wp-content/uploads/2024/06/Company-logo-8.svg">
                </div>
            </div>
            <div class="logo">
                <div class="image">
                    <img src="https://felan.ricetheme.com/wp-content/uploads/2024/06/Company-logo-1.svg">
                </div>
            </div>
            <div class="logo">
                <div class="image">
                    <img src="https://felan.ricetheme.com/wp-content/uploads/2024/06/Company-logo-2.svg">
                </div>
            </div>
            <div class="logo">
                <div class="image">
                    <img src="https://felan.ricetheme.com/wp-content/uploads/2024/06/Company-logo-3.svg">
                </div>
            </div>
            <div class="logo">
                <div class="image">
                    <img src="https://felan.ricetheme.com/wp-content/uploads/2024/06/Company-logo-4.svg">
                </div>
            </div>
            <div class="logo">
                <div class="image">
                    <img src="https://felan.ricetheme.com/wp-content/uploads/2024/06/Company-logo-5.svg">
                </div>
            </div>
        </div>
        <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
        <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
        <script type="text/javascript" src="slick/slick.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $('.slider_brand').slick({
                    slidesToShow: 6,
                    autoplay: true,
                    arrows: false,
                    infinite: true,
                    speed: 3000,
                    autoplaySpeed: 0,
                    cssEase: 'linear',
                    slidesToScroll: 1,
                    pauseOnHover: true,
                    responsive: [{
                            breakpoint: 1024,
                            settings: {
                                slidesToShow: 4,
                                slidesToScroll: 1
                            }
                        },
                        {
                            breakpoint: 768,
                            settings: {
                                slidesToShow: 3,
                                slidesToScroll: 1
                            }
                        },
                    ]
                });
            });
        </script>
        {{-- Slide show end --}}

        {{-- Job list start --}}
        <div class="" style="text-align:center; padding:30px 0;">
            <p class="text-center wow fadeInUp top joblist">Job Listing</p>
            @if (isset($jobs) && count($jobs) > 0)
                @foreach ($jobs as $job)
                    <div class="box wow fadeInUp" style="width: 90%; margin-right: auto; margin-left: auto">
                        <div class="box-body">
                            <div class="left-box">
                                <div class="left-top">
                                    <div class="left-top-logo">
                                        <img src="{{ asset($job->company_logo) }}"
                                            style="
                                        width: 70px;
                                        height: 70px;
                                        border-radius: 50%;">
                                    </div>
                                    <div class="left-top-title">
                                        <a href="{{ route('companyProfile', $job->user_id) }}" class="company-link">
                                            <span class="company-name"
                                                style="color: #1e1e1e">{{ $job->company_name }}</span>
                                            <span class="freelancer-tag">Freelancer</span>
                                        </a>
                                        <span class="place-time" style="text-align: left;">
                                            <i class="place-time-icon fa-solid fa-location-dot"></i>
                                            <span class="place-time-content">{{ $job->location }}
                                                <em><small>{{ $job->created_at->diffForHumans() }}</small></em>
                                            </span>
                                    </div>
                                </div>
                                <div class="left-buttom ">
                                    <div class="left-buttom-tag">
                                        <span style="color: #1e1e1e">
                                            <span class="tag-title">Salary:</span> ${{ $job->salary_min }} -
                                            ${{ $job->salary_max }}
                                        </span>
                                        <span class="tag-open" style="color: #1e1e1e">
                                            <span class="tag-title">Openings Position:</span>
                                            {{ $job->openings_position }}
                                        </span>
                                        <span class="tag-exp" style="color: #1e1e1e">
                                            <span class="tag-title">Experience:</span> {{ $job->experience_required }}
                                            year
                                        </span>
                                    </div>
                                    <div class="left-buttom-more">
                                        <a href="{{ route('guest.jobDetail', ['job_id' => $job->job_id]) }}"
                                            class="btn btn-sm mt-lg-0 mt-2 more-info-btn">More Info</a>
                                    </div>
                                </div>
                            </div>
                            <div class="right-box">
                                <span class="job-title">
                                    <small class="text-fade fs-12">Openings Position</small><br>
                                    <span class="job-title-name"
                                        style="color: #1e1e1e; font-weight: 500">{{ $job->job_title }}</span>
                                </span>
                                <form action="{{ route('freelancer.applyJob') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="job_id" value="{{ $job->job_id }}">
                                    <button id="apply-btn" type="submit" class="job-btn">
                                        Apply Now!
                                    </button>
                                </form>
                            </div>

                        </div>
                    </div>
                @endforeach
            @else
                <p>No job here</p>
            @endif

        </div>
        {{-- job list end --}}

        {{-- How to start start --}}
        <section class="how-to-start">
            <div class="how-to-container">
                <span class="how-to-title wow fadeInUp" data-wow-delay="0.1s">Just 3 Easy Steps to New
                    Capabilities</span>
                <ul class="list-linked wow fadeInUp" data-wow-delay="0.3s"">
                    <li class="ll-item">
                        <div class="out-cirlce">
                            <div class="circle1" id="circle1">
                                <div class="circle2">
                                    <img src="{{ asset('homepage/images/search-icon.png') }}" style="width:40%">
                                </div>
                            </div>
                        </div>
                        <div class="ll-item-main">
                            <h5 class="ll-item-title">1. Browse Jobs</h5>
                            <p>Easy search by category</p>
                        </div>
                    </li>
                    <li class="ll-item">
                        <div class="out-cirlce">
                            <div class="circle1" id="circle1">
                                <div class="circle2">
                                    <img src="{{ asset('homepage/images/target-icon.png') }}" style="width:80%">
                                </div>
                            </div>
                        </div>
                        <div class="ll-item-main">
                            <h5 class="ll-item-title">2. Find Your Vacancy</h5>
                            <p>Choose a suitable job</p>
                        </div>
                    </li>
                    <li class="ll-item">
                        <div class="out-cirlce">
                            <div class="circle1" id="circle1">
                                <div class="circle2">
                                    <img src="{{ asset('homepage/images/mail-icon.png') }}" style="width:60%">
                                </div>
                            </div>
                        </div>
                        <div class="ll-item-main">
                            <h5 class="ll-item-title">3. Submit Resume</h5>
                            <p>Get a personal job offer</p>
                        </div>
                    </li>
                    <li class="ll-item">
                        <div class="out-cirlce">
                            <div class="circle1" id="circle1">
                                <div class="circle2">
                                    <img src="{{ asset('homepage/images/click-icon.png') }}" style="width:50%">
                                </div>
                            </div>
                        </div>
                        <div class="ll-item-main"><a class="button button-sm button-primary-outline"
                                href="{{ route('register') }}">Start Now</a></div>
                    </li>
                </ul>
            </div>

        </section>
        {{-- How to start end --}}

        <!-- About Start -->
        <section class="about">
            <div class="container">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                        <div class="row g-0 about-bg rounded overflow-hidden">
                            <div class="col-6 text-start">
                                <img class="img-fluid w-100" src="{{ asset('homepage/images/about-1.jpg') }}">
                            </div>
                            <div class="col-6 text-start">
                                <img class="img-fluid" src="{{ asset('homepage/images/about-2.jpg') }}"
                                    style="width: 85%; margin-top: 15%;">
                            </div>
                            <div class="col-6 text-end">
                                <img class="img-fluid" src="{{ asset('homepage/images/about-3.jpg') }}"
                                    style="width: 85%;">
                            </div>
                            <div class="col-6 text-end">
                                <img class="img-fluid w-100" src="{{ asset('homepage/images/about-4.jpg') }}">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 wow fadeIn about-content" data-wow-delay="0.5s">
                        <span class="about-title">We Help To Find Talents</span>
                        <p class="">Finding the right talent for your business has never been easier.
                            Our platform bridges the gap between employers and skilled freelancers, providing a
                            space where both parties can thrive. Discover top talent, streamline hiring processes, and
                            build
                            your team with confidence.</p>
                        <p><i class="fa fa-check icon-about me-3"></i>Skilled professionals ready to join your team</p>
                        <p><i class="fa fa-check icon-about me-3"></i>Simple and efficient hiring process</p>
                        <p><i class="fa fa-check icon-about me-3"></i>Flexible solutions tailored to your business
                            needs</p>
                        <div class="">
                            <a class="btn btn-primary py-3 px-3 about-button" href="{{ route('login') }}">Hire
                                Freelancers Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- About End -->

        {{-- Top freelancers start --}}
        <section class="container-fluid freelancer-section">
            <p class="freelancer-title wow fadeInUp top" data-wow-delay="0.1s">Top Freelancers</p>
            <div class="slider-freelancer wow fadeInUp" data-wow-delay="0.3s">
                @foreach ($freelancers as $freelancer)
                    <div class="freelancer-card">
                        <img src="{{ asset($freelancer->avatar) }}" class="freelancer-avatar">
                        <p class="freelancer-name">
                            <span>{{ $freelancer->user->firstname }} {{ $freelancer->user->lastname }}</span>
                        </p>
                        <ul class="rating-star" style="font-size: 14px">
                            @php
                                $score = $freelancer->rating;
                                $fullStars = floor($score);
                                $halfStar = $score - $fullStars >= 0.5;
                                $emptyStars = 5 - $fullStars - ($halfStar ? 1 : 0);
                            @endphp

                            @for ($i = 0; $i < $fullStars; $i++)
                                <li class="active"><i class="fa fa-star" style="font-size: 16px"></i></li>
                            @endfor

                            @if ($halfStar)
                                <li class="active half"><i class="fa fa-star-half-alt" style="font-size: 16px"></i></li>
                            @endif

                            @for ($i = 0; $i < $emptyStars; $i++)
                                <li><i class="fa fa-star" style="color: #ddd; font-size: 16px"></i></li>
                            @endfor

                            <span style="margin-left: 5px">({{ $freelancer->rating }})</span>
                        </ul>
                        <p class="freelancer-work">{{ $freelancer->user->email }}</p>
                        <div class="freelancer-info">
                            <span>
                                <svg class="freelancer-icon" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M12.5599 20.8207C12.2247 21.0598 11.7753 21.0598 11.4401 20.8207C6.61138 17.3773 1.48557 10.2971 6.6667 5.18128C8.08118 3.78463 9.99963 3 12 3C14.0004 3 15.9188 3.78463 17.3333 5.18128C22.5144 10.2971 17.3886 17.3773 12.5599 20.8207Z"
                                        stroke="#111111" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round">
                                    </path>
                                    <path
                                        d="M12 12C13.1046 12 14 11.1046 14 10C14 8.89543 13.1046 8 12 8C10.8954 8 10 8.89543 10 10C10 11.1046 10.8954 12 12 12Z"
                                        stroke="#111111" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round">
                                    </path>
                                </svg>
                                {{ $freelancer->address }}
                            </span>
                            <span>
                                <svg class="freelancer-icon" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M12 21C16.9706 21 21 16.9706 21 12C21 7.02944 16.9706 3 12 3M12 21C7.02944 21 3 16.9706 3 12C3 7.02944 7.02944 3 12 3M12 21C14.7614 21 15.9413 15.837 15.9413 12C15.9413 8.16303 14.7614 3 12 3M12 21C9.23858 21 8.05895 15.8369 8.05895 12C8.05895 8.16307 9.23858 3 12 3M3.49988 8.99998C10.1388 8.99998 13.861 8.99998 20.4999 8.99998M3.49988 15C10.1388 15 13.861 15 20.4999 15"
                                        stroke="black" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round">
                                    </path>
                                </svg>
                                {{ $freelancer->languages }}
                            </span>
                        </div>
                    </div>
                @endforeach
            </div>

            <script type="text/javascript">
                $(document).ready(function() {
                    $('.slider-freelancer').slick({
                        slidesToShow: 4,
                        autoplay: true,
                        arrows: true,
                        infinite: true,
                        // dots: true,
                        autoplaySpeed: 2000,
                        cssEase: 'linear',
                        slidesToScroll: 1,
                        responsive: [{
                                breakpoint: 1024,
                                settings: {
                                    slidesToShow: 3,
                                    slidesToScroll: 1
                                }
                            },
                            {
                                breakpoint: 768,
                                settings: {
                                    slidesToShow: 2,
                                    slidesToScroll: 1
                                }
                            },
                            {
                                breakpoint: 480,
                                settings: {
                                    slidesToShow: 1,
                                    slidesToScroll: 1
                                }
                            }
                        ]
                    });

                    function setArrowIcons() {
                        $('.slick-prev').html('<');
                        $('.slick-next').html('>');
                    }

                    setArrowIcons();

                    $('.slider-freelancer').on('afterChange', function() {
                        setArrowIcons();
                    });
                });
            </script>

        </section>
        {{-- Top freelancer end --}}
    </div>

    <div class="shortcut-buttons">
        <a href="{{ route('welcome') }}" class="shortcut-button" title="Homepage">
            <i class="fa-solid fa-house"></i>
        </a>
        <a href="{{ route('login') }}" class="shortcut-button" title="Login">
            <i class="fa-solid fa-arrow-right-to-bracket"></i>
        </a>
        <a href="{{ route('findJob') }}" class="shortcut-button" title="Find job">
            <i class="fa-solid fa-magnifying-glass"></i>
        </a>
    </div>

    <footer class="footer text-center text-lg-start text-white" style="background-color: #181824">
        <div class="container py-4">
            <div class="row">
                <div class="logo-grap col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
                    <img class="footer-logo" src="{{ asset('welcome_assets/images/Logo_white.png') }}"
                        alt="">
                </div>
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

                <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">
                    <h6 class=" mb-4 font-weight-bold text-white">Contact</h6>
                    <p clas="text-gray"><i class="fas fa-home mr-3 text-gray"></i> Da Nang, Viet Nam</p>
                    <p clas="text-gray"><i class="fas fa-envelope mr-3 text-gray"></i> felancegr@gmail.com</p>
                    <p clas="text-gray"><i class="fas fa-phone mr-3 text-gray"></i> + 01 234 567 88</p>
                </div>

                <div class="footer-icon col-md-3 col-lg-2 col-xl-2 mx-auto mt-3">
                    <h6 class="mb-4 font-weight-bold text-white">Follow us</h6>

                    <a class="btn btn-primary btn-floating m-1" style="background-color: #31497e" href="#!"
                        role="button"><i class="fab fa-facebook-f"></i></a>

                    <a class="btn btn-primary btn-floating m-1" style="background-color: #1e1e1e" href="#!"
                        role="button"><i class="fa-brands fa-x-twitter"></i></a>

                    <a class="btn btn-primary btn-floating m-1" style="background-color: #dd4b39" href="#!"
                        role="button"><i class="fab fa-google"></i></a>

                    <br>

                    <a class="btn btn-primary btn-floating m-1" style="background-color: #c21c54" href="#!"
                        role="button"><i class="fab fa-instagram"></i></a>

                    <a class="btn btn-primary btn-floating m-1" style="background-color: #0082ca" href="#!"
                        role="button"><i class="fab fa-linkedin-in"></i></a>

                    <a class="btn btn-primary btn-floating m-1" style="background-color: #333333" href="#!"
                        role="button"><i class="fab fa-github"></i></a>
                </div>
            </div>

        </div>
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
            © 2024 Copyright:
            <a class="text-white" href="{{ route('welcome') }}">felance.com</a>
        </div>
    </footer>
    {{-- Footer end --}}
    <script src="{{ asset('homepage/js/script.js') }}"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="https://kit.fontawesome.com/406c9ab88b.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
