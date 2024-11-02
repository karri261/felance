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
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('welcome_assets/style.css') }}">
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
            </div>

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
    {{-- End header --}}

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
