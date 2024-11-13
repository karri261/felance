{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Freelancer Job Portal</title>
    <link rel="stylesheet" href="{{ asset('homepage/style.css') }}">
</head>
<body>
    <section class="hero">
        <div class="hero-content">
            <h1>Find Your Next <span class="highlight">Freelance</span> Opportunity</h1>
            <p>Join thousands of freelancers connecting with <span class="sub-highlight">top companies</span> for remote and flexible jobs</p>
            <div class="search-bar">
                <input type="text" placeholder="Job title, keywords,...">
                <button>Find job</button>
            </div>
        </div>
        <div class="hero-image">
            <img src="{{ asset('homepage/images/background_hero.svg') }}" alt="Freelancer illustration" style="transform: scaleX(-1); " class="image_hero">
        </div>
    </section>
</body>
</html> --}}
@extends('welcome')

@section('main-content')
    <div class="hero">
        <div class="hero-content">
            <h1>Find Your Next<br> <span class="highlight">Freelance</span> Opportunity</h1>
            <p>Join thousands of freelancers connecting with <span class="sub-highlight">top companies</span> for remote and
                flexible jobs</p>
            <div class="search-bar">
                <span class="icon-search">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </span>
                <input type="text" placeholder="Job title, keywords,...">
                <button>Find job</button>
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
    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('homepage/lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('homepage/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('homepage/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('homepage/lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('homepage/js/main.js') }}"></script>
    <div class="" style="text-align:center; padding:30px 0;">
        <p class="text-center wow fadeInUp top joblist">Job Listing</p>
        @if (isset($jobs) && count($jobs) > 0)
            @foreach ($jobs as $job)
                <div class="box wow fadeInUp" >
                    <div class="box-body">
                        <div class=left-box">
                            <div class="left-top"> {{-- d-flex align-items-center mb-30 --}}
                                <div class="left-top-logo"> {{-- me-15 --}}
                                    <img src="{{ asset($job->company_logo) }}" class="">{{-- avatar avatar-lg me-3 avatar-logo --}}
                                </div>
                                <div class="left-top-title"> {{-- d-flex flex-column --}}
                                    <a href="#" class="company-link">
                                        <span class="company-name">{{ $job->company_name }}</span>
                                        <span class="freelancer-tag">Freelancer</span>
                                    </a>
                                    <span class="place-time" style="text-align: left;"> {{-- fs-14 --}}
                                        <i class="place-time-icon fa-solid fa-location-dot"></i>
                                        <span class="place-time-content">{{ $job->location }} {{-- text-fade --}}
                                            <em><small>{{ $job->created_at->diffForHumans() }}</small></em>
                                        </span>
                                </div>
                            </div>
                            <div class="left-buttom "> {{-- d-lg-flex align-items-center justify-content-between0 --}}
                                <div class="left-buttom-tag"> {{-- d-lg-flex d-block align-items-center --}}
                                    <span> {{-- d-inline-block mb-0 rounded info-tag --}}
                                        <span class="tag-title">Salary:</span> ${{ $job->salary_min }} -
                                        ${{ $job->salary_max }}
                                    </span>
                                    <span class="tag-open"> {{-- d-inline-block mb-0 rounded mx-10 my-0 info-tag --}}
                                        <span class="tag-title">Openings Position:</span> {{ $job->openings_position }}
                                    </span>
                                    <span class="tag-exp"> {{-- d-inline-block mb-0 rounded info-tag --}}
                                        <span class="tag-title">Experience:</span> {{ $job->experience_required }} year
                                    </span>
                                </div>
                                <div class="left-buttom-more">{{-- ms-lg-10 --}}
                                    <a href="{{ route('jobDetail', ['job_id' => $job->job_id]) }}"
                                        class="btn btn-sm mt-lg-0 mt-2 more-info-btn">More Info</a>
                                </div>
                            </div>
                        </div>
                        <div class="right-box"> {{-- position-relative w-xl-300 w-lg-250 ps-lg-20 bs-1 ms-lg-20 --}}
                            <span class="job-title">
                                <small class="text-fade fs-12">Openings Position</small><br>
                                <span class="job-title-name">{{ $job->job_title }}</span>
                            </span>
                            <form action="{{ route('freelancer.applyJob') }}" method="POST">
                                @csrf
                                <input type="hidden" name="job_id" value="{{ $job->job_id }}">
                                <button id="apply-btn" type="submit" class="job-btn"> {{-- btn w-100 btn-primary --}}
                                    Apply Now!
                                </button>
                            </form>
                        </div>

                    </div>
                </div>
            @endforeach
            <div class="custom-pagination">
                {{ $jobs->links('pagination::bootstrap-5') }}
            </div>
        @else
            <p>Không có công việc nào. </p>
        @endif

    </div>
    {{-- job list end --}}

    {{-- How to start start --}}
    <section class="how-to-start">
        <div class="how-to-container">
            <span class="how-to-title wow fadeInUp" data-wow-delay="0.1s">Just 3 Easy Steps to New Capabilities</span>
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
                            href="job-listing.html">Start Now</a></div>
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
                            <img class="img-fluid" src="{{ asset('homepage/images/about-3.jpg') }}" style="width: 85%;">
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
                        space where both parties can thrive. Discover top talent, streamline hiring processes, and build
                        your team with confidence.</p>
                    <p><i class="fa fa-check icon-about me-3"></i>Skilled professionals ready to join your team</p>
                    <p><i class="fa fa-check icon-about me-3"></i>Simple and efficient hiring process</p>
                    <p><i class="fa fa-check icon-about me-3"></i>Flexible solutions tailored to your business needs</p>
                    <div class="">
                        <a class="btn btn-primary py-3 px-3 about-button" href="">Hire Freelancers Now</a>
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
            <div class="freelancer-card">
                <img src="{{ asset('homepage/images/freelnce-1.jpg') }}" alt="Freelancer 1" class="freelancer-avatar">
                <p class="freelancer-name">Kevin Ble</p>
                <p class="freelancer-work">Frontend Developer</p>
                <div class="freelancer-info">
                    <span>
                        <svg class="freelancer-icon" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <circle cx="12" cy="12" r="9" stroke="black" stroke-width="1.5"
                                stroke-linecap="round" stroke-linejoin="round"></circle>
                            <path
                                d="M15.3333 7.72222H12M12 7.72222H10.3333C9.04467 7.72222 8 8.67984 8 9.86111C8 11.0424 9.04467 12 10.3333 12H12M12 7.72222V6.5M12 7.72222V12M12 12H13.6667C14.9553 12 16 12.9576 16 14.1389C16 15.3202 14.9553 16.2778 13.6667 16.2778H12M12 12V16.2778M12 16.2778H8M12 16.2778V17.5"
                                stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                            </path>
                        </svg>
                        $450/month
                    </span>
                    <span>
                        <svg class="freelancer-icon" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M12.5599 20.8207C12.2247 21.0598 11.7753 21.0598 11.4401 20.8207C6.61138 17.3773 1.48557 10.2971 6.6667 5.18128C8.08118 3.78463 9.99963 3 12 3C14.0004 3 15.9188 3.78463 17.3333 5.18128C22.5144 10.2971 17.3886 17.3773 12.5599 20.8207Z"
                                stroke="#111111" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                            </path>
                            <path
                                d="M12 12C13.1046 12 14 11.1046 14 10C14 8.89543 13.1046 8 12 8C10.8954 8 10 8.89543 10 10C10 11.1046 10.8954 12 12 12Z"
                                stroke="#111111" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                            </path>
                        </svg>
                        San Diego</span>
                    <span>
                        <svg class="freelancer-icon" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M12 21C16.9706 21 21 16.9706 21 12C21 7.02944 16.9706 3 12 3M12 21C7.02944 21 3 16.9706 3 12C3 7.02944 7.02944 3 12 3M12 21C14.7614 21 15.9413 15.837 15.9413 12C15.9413 8.16303 14.7614 3 12 3M12 21C9.23858 21 8.05895 15.8369 8.05895 12C8.05895 8.16307 9.23858 3 12 3M3.49988 8.99998C10.1388 8.99998 13.861 8.99998 20.4999 8.99998M3.49988 15C10.1388 15 13.861 15 20.4999 15"
                                stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                            </path>
                        </svg>
                        Japanese</span>
                </div>
                <div class="freelancer-tags">
                    <span class="tag">Developer</span>
                    <span class="tag">Software</span>
                </div>
                <div class="freelancer-rating">
                    <span>⭐4.8 (1)</span>
                    <span>5 services</span>
                </div>
            </div>
            <div class="freelancer-card">
                <img src="{{ asset('homepage/images/freelnce-4.jpg') }}" alt="Freelancer 1" class="freelancer-avatar">
                <p class="freelancer-name">Kevin Ble</p>
                <p class="freelancer-work">Frontend Developer</p>
                <div class="freelancer-info">
                    <span>
                        <svg class="freelancer-icon" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <circle cx="12" cy="12" r="9" stroke="black" stroke-width="1.5"
                                stroke-linecap="round" stroke-linejoin="round"></circle>
                            <path
                                d="M15.3333 7.72222H12M12 7.72222H10.3333C9.04467 7.72222 8 8.67984 8 9.86111C8 11.0424 9.04467 12 10.3333 12H12M12 7.72222V6.5M12 7.72222V12M12 12H13.6667C14.9553 12 16 12.9576 16 14.1389C16 15.3202 14.9553 16.2778 13.6667 16.2778H12M12 12V16.2778M12 16.2778H8M12 16.2778V17.5"
                                stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                            </path>
                        </svg>
                        $450/month
                    </span>
                    <span>
                        <svg class="freelancer-icon" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M12.5599 20.8207C12.2247 21.0598 11.7753 21.0598 11.4401 20.8207C6.61138 17.3773 1.48557 10.2971 6.6667 5.18128C8.08118 3.78463 9.99963 3 12 3C14.0004 3 15.9188 3.78463 17.3333 5.18128C22.5144 10.2971 17.3886 17.3773 12.5599 20.8207Z"
                                stroke="#111111" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                            </path>
                            <path
                                d="M12 12C13.1046 12 14 11.1046 14 10C14 8.89543 13.1046 8 12 8C10.8954 8 10 8.89543 10 10C10 11.1046 10.8954 12 12 12Z"
                                stroke="#111111" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                            </path>
                        </svg>
                        San Diego</span>
                    <span>
                        <svg class="freelancer-icon" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M12 21C16.9706 21 21 16.9706 21 12C21 7.02944 16.9706 3 12 3M12 21C7.02944 21 3 16.9706 3 12C3 7.02944 7.02944 3 12 3M12 21C14.7614 21 15.9413 15.837 15.9413 12C15.9413 8.16303 14.7614 3 12 3M12 21C9.23858 21 8.05895 15.8369 8.05895 12C8.05895 8.16307 9.23858 3 12 3M3.49988 8.99998C10.1388 8.99998 13.861 8.99998 20.4999 8.99998M3.49988 15C10.1388 15 13.861 15 20.4999 15"
                                stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                            </path>
                        </svg>
                        Japanese</span>
                </div>
                <div class="freelancer-tags">
                    <span class="tag">Developer</span>
                    <span class="tag">Software</span>
                </div>
                <div class="freelancer-rating">
                    <span>⭐4.8 (1)</span>
                    <span>5 services</span>
                </div>
            </div>
            <div class="freelancer-card">
                <img src="{{ asset('homepage/images/freelnce-5.jpg') }}" alt="Freelancer 1" class="freelancer-avatar">
                <p class="freelancer-name">Kevin Ble</p>
                <p class="freelancer-work">Frontend Developer</p>
                <div class="freelancer-info">
                    <span>
                        <svg class="freelancer-icon" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <circle cx="12" cy="12" r="9" stroke="black" stroke-width="1.5"
                                stroke-linecap="round" stroke-linejoin="round"></circle>
                            <path
                                d="M15.3333 7.72222H12M12 7.72222H10.3333C9.04467 7.72222 8 8.67984 8 9.86111C8 11.0424 9.04467 12 10.3333 12H12M12 7.72222V6.5M12 7.72222V12M12 12H13.6667C14.9553 12 16 12.9576 16 14.1389C16 15.3202 14.9553 16.2778 13.6667 16.2778H12M12 12V16.2778M12 16.2778H8M12 16.2778V17.5"
                                stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                            </path>
                        </svg>
                        $450/month
                    </span>
                    <span>
                        <svg class="freelancer-icon" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M12.5599 20.8207C12.2247 21.0598 11.7753 21.0598 11.4401 20.8207C6.61138 17.3773 1.48557 10.2971 6.6667 5.18128C8.08118 3.78463 9.99963 3 12 3C14.0004 3 15.9188 3.78463 17.3333 5.18128C22.5144 10.2971 17.3886 17.3773 12.5599 20.8207Z"
                                stroke="#111111" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                            </path>
                            <path
                                d="M12 12C13.1046 12 14 11.1046 14 10C14 8.89543 13.1046 8 12 8C10.8954 8 10 8.89543 10 10C10 11.1046 10.8954 12 12 12Z"
                                stroke="#111111" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                            </path>
                        </svg>
                        San Diego</span>
                    <span>
                        <svg class="freelancer-icon" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M12 21C16.9706 21 21 16.9706 21 12C21 7.02944 16.9706 3 12 3M12 21C7.02944 21 3 16.9706 3 12C3 7.02944 7.02944 3 12 3M12 21C14.7614 21 15.9413 15.837 15.9413 12C15.9413 8.16303 14.7614 3 12 3M12 21C9.23858 21 8.05895 15.8369 8.05895 12C8.05895 8.16307 9.23858 3 12 3M3.49988 8.99998C10.1388 8.99998 13.861 8.99998 20.4999 8.99998M3.49988 15C10.1388 15 13.861 15 20.4999 15"
                                stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                            </path>
                        </svg>
                        Japanese</span>
                </div>
                <div class="freelancer-tags">
                    <span class="tag">Developer</span>
                    <span class="tag">Software</span>
                </div>
                <div class="freelancer-rating">
                    <span>⭐4.8 (1)</span>
                    <span>5 services</span>
                </div>
            </div>
            <div class="freelancer-card">
                <img src="{{ asset('homepage/images/freelnce-6.jpg') }}" alt="Freelancer 1" class="freelancer-avatar">
                <p class="freelancer-name">Kevin Ble</p>
                <p class="freelancer-work">Frontend Developer</p>
                <div class="freelancer-info">
                    <span>
                        <svg class="freelancer-icon" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <circle cx="12" cy="12" r="9" stroke="black" stroke-width="1.5"
                                stroke-linecap="round" stroke-linejoin="round"></circle>
                            <path
                                d="M15.3333 7.72222H12M12 7.72222H10.3333C9.04467 7.72222 8 8.67984 8 9.86111C8 11.0424 9.04467 12 10.3333 12H12M12 7.72222V6.5M12 7.72222V12M12 12H13.6667C14.9553 12 16 12.9576 16 14.1389C16 15.3202 14.9553 16.2778 13.6667 16.2778H12M12 12V16.2778M12 16.2778H8M12 16.2778V17.5"
                                stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                            </path>
                        </svg>
                        $450/month
                    </span>
                    <span>
                        <svg class="freelancer-icon" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M12.5599 20.8207C12.2247 21.0598 11.7753 21.0598 11.4401 20.8207C6.61138 17.3773 1.48557 10.2971 6.6667 5.18128C8.08118 3.78463 9.99963 3 12 3C14.0004 3 15.9188 3.78463 17.3333 5.18128C22.5144 10.2971 17.3886 17.3773 12.5599 20.8207Z"
                                stroke="#111111" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                            </path>
                            <path
                                d="M12 12C13.1046 12 14 11.1046 14 10C14 8.89543 13.1046 8 12 8C10.8954 8 10 8.89543 10 10C10 11.1046 10.8954 12 12 12Z"
                                stroke="#111111" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                            </path>
                        </svg>
                        San Diego</span>
                    <span>
                        <svg class="freelancer-icon" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M12 21C16.9706 21 21 16.9706 21 12C21 7.02944 16.9706 3 12 3M12 21C7.02944 21 3 16.9706 3 12C3 7.02944 7.02944 3 12 3M12 21C14.7614 21 15.9413 15.837 15.9413 12C15.9413 8.16303 14.7614 3 12 3M12 21C9.23858 21 8.05895 15.8369 8.05895 12C8.05895 8.16307 9.23858 3 12 3M3.49988 8.99998C10.1388 8.99998 13.861 8.99998 20.4999 8.99998M3.49988 15C10.1388 15 13.861 15 20.4999 15"
                                stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                            </path>
                        </svg>
                        Japanese</span>
                </div>
                <div class="freelancer-tags">
                    <span class="tag">Developer</span>
                    <span class="tag">Software</span>
                </div>
                <div class="freelancer-rating">
                    <span>⭐4.8 (1)</span>
                    <span>5 services</span>
                </div>
            </div>
            <div class="freelancer-card">
                <img src="{{ asset('homepage/images/freelnce-7.jpg') }}" alt="Freelancer 1" class="freelancer-avatar">
                <p class="freelancer-name">Kevin Ble</p>
                <p class="freelancer-work">Frontend Developer</p>
                <div class="freelancer-info">
                    <span>
                        <svg class="freelancer-icon" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <circle cx="12" cy="12" r="9" stroke="black" stroke-width="1.5"
                                stroke-linecap="round" stroke-linejoin="round"></circle>
                            <path
                                d="M15.3333 7.72222H12M12 7.72222H10.3333C9.04467 7.72222 8 8.67984 8 9.86111C8 11.0424 9.04467 12 10.3333 12H12M12 7.72222V6.5M12 7.72222V12M12 12H13.6667C14.9553 12 16 12.9576 16 14.1389C16 15.3202 14.9553 16.2778 13.6667 16.2778H12M12 12V16.2778M12 16.2778H8M12 16.2778V17.5"
                                stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                            </path>
                        </svg>
                        $450/month
                    </span>
                    <span>
                        <svg class="freelancer-icon" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M12.5599 20.8207C12.2247 21.0598 11.7753 21.0598 11.4401 20.8207C6.61138 17.3773 1.48557 10.2971 6.6667 5.18128C8.08118 3.78463 9.99963 3 12 3C14.0004 3 15.9188 3.78463 17.3333 5.18128C22.5144 10.2971 17.3886 17.3773 12.5599 20.8207Z"
                                stroke="#111111" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                            </path>
                            <path
                                d="M12 12C13.1046 12 14 11.1046 14 10C14 8.89543 13.1046 8 12 8C10.8954 8 10 8.89543 10 10C10 11.1046 10.8954 12 12 12Z"
                                stroke="#111111" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                            </path>
                        </svg>
                        San Diego</span>
                    <span>
                        <svg class="freelancer-icon" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M12 21C16.9706 21 21 16.9706 21 12C21 7.02944 16.9706 3 12 3M12 21C7.02944 21 3 16.9706 3 12C3 7.02944 7.02944 3 12 3M12 21C14.7614 21 15.9413 15.837 15.9413 12C15.9413 8.16303 14.7614 3 12 3M12 21C9.23858 21 8.05895 15.8369 8.05895 12C8.05895 8.16307 9.23858 3 12 3M3.49988 8.99998C10.1388 8.99998 13.861 8.99998 20.4999 8.99998M3.49988 15C10.1388 15 13.861 15 20.4999 15"
                                stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                            </path>
                        </svg>
                        Japanese</span>
                </div>
                <div class="freelancer-tags">
                    <span class="tag">Developer</span>
                    <span class="tag">Software</span>
                </div>
                <div class="freelancer-rating">
                    <span>⭐4.8 (1)</span>
                    <span>5 services</span>
                </div>
            </div>
            <div class="freelancer-card">
                <img src="{{ asset('homepage/images/freelnce-8.jpg') }}" alt="Freelancer 1" class="freelancer-avatar">
                <p class="freelancer-name">Kevin Ble</p>
                <p class="freelancer-work">Frontend Developer</p>
                <div class="freelancer-info">
                    <span>
                        <svg class="freelancer-icon" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <circle cx="12" cy="12" r="9" stroke="black" stroke-width="1.5"
                                stroke-linecap="round" stroke-linejoin="round"></circle>
                            <path
                                d="M15.3333 7.72222H12M12 7.72222H10.3333C9.04467 7.72222 8 8.67984 8 9.86111C8 11.0424 9.04467 12 10.3333 12H12M12 7.72222V6.5M12 7.72222V12M12 12H13.6667C14.9553 12 16 12.9576 16 14.1389C16 15.3202 14.9553 16.2778 13.6667 16.2778H12M12 12V16.2778M12 16.2778H8M12 16.2778V17.5"
                                stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                            </path>
                        </svg>
                        $450/month
                    </span>
                    <span>
                        <svg class="freelancer-icon" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M12.5599 20.8207C12.2247 21.0598 11.7753 21.0598 11.4401 20.8207C6.61138 17.3773 1.48557 10.2971 6.6667 5.18128C8.08118 3.78463 9.99963 3 12 3C14.0004 3 15.9188 3.78463 17.3333 5.18128C22.5144 10.2971 17.3886 17.3773 12.5599 20.8207Z"
                                stroke="#111111" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                            </path>
                            <path
                                d="M12 12C13.1046 12 14 11.1046 14 10C14 8.89543 13.1046 8 12 8C10.8954 8 10 8.89543 10 10C10 11.1046 10.8954 12 12 12Z"
                                stroke="#111111" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                            </path>
                        </svg>
                        San Diego</span>
                    <span>
                        <svg class="freelancer-icon" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M12 21C16.9706 21 21 16.9706 21 12C21 7.02944 16.9706 3 12 3M12 21C7.02944 21 3 16.9706 3 12C3 7.02944 7.02944 3 12 3M12 21C14.7614 21 15.9413 15.837 15.9413 12C15.9413 8.16303 14.7614 3 12 3M12 21C9.23858 21 8.05895 15.8369 8.05895 12C8.05895 8.16307 9.23858 3 12 3M3.49988 8.99998C10.1388 8.99998 13.861 8.99998 20.4999 8.99998M3.49988 15C10.1388 15 13.861 15 20.4999 15"
                                stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                            </path>
                        </svg>
                        Japanese</span>
                </div>
                <div class="freelancer-tags">
                    <span class="tag">Developer</span>
                    <span class="tag">Software</span>
                </div>
                <div class="freelancer-rating">
                    <span>⭐4.8 (1)</span>
                    <span>5 services</span>
                </div>
            </div>
            {{-- <button class="slick-prev"><</button>
            <button class="slick-next">></button> --}}
            <!-- Thêm nhiều thẻ .freelancer-card cho các freelancer khác tương tự như trên -->
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

                // Đặt lại nội dung cho nút prev và next sau khi slider khởi động
                function setArrowIcons() {
                    $('.slick-prev').html('<');
                    $('.slick-next').html('>');
                }

                // Gọi hàm setArrowIcons khi slider đã khởi động xong
                setArrowIcons();

                // Đảm bảo các biểu tượng được thiết lập lại sau mỗi lần thay đổi slide
                $('.slider-freelancer').on('afterChange', function() {
                    setArrowIcons();
                });
            });
        </script>

    </section>
    {{-- Top freelancer end --}}
@endsection
