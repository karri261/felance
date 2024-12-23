<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('freelancer_assets/css/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/perfect-scrollbar@1.5.0/css/perfect-scrollbar.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/perfect-scrollbar@1.5.0/dist/perfect-scrollbar.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css" />
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>
    
</head>

<body>
    <div class="horizontal-menu">
        <nav class="navbar top-navbar col-lg-12 col-12 p-0">
            <div class="container">
                <div class="navbar-brand-wrapper d-flex"
                    style="text-align: center; align-items: center; justify-content: center">
                    <a class="navbar-brand" href="{{ route('freelancer') }}">
                        <img src="{{ asset('welcome_assets/images/logo_name.png') }}" alt="logo" /></a>
                </div>
                <div class="navbar-menu-wrapper d-flex" style="align-items: center; justify-content: end;">
                    <ul class="navbar-nav d-flex" style="flex-direction: row">
                        <li class="nav-item">
                            <a class="nav-link d-flex dropdown-toggle" id="UserDropdown" href="#"
                                style="align-items: center" data-bs-toggle="dropdown" aria-expanded="false">
                                <img class="img-xs rounded-circle me-2" src="{{ asset($freelancer->avatar) }}"
                                    alt="Profile image">
                                <span class="d-none d-md-inline"> {{ $user->firstname }} {{ $user->lastname }} </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right navbar-dropdown"
                                aria-labelledby="UserDropdown">
                                <div class="dropdown-header text-center">
                                    <img class="img-md rounded-circle" src="{{ asset($freelancer->avatar) }}"
                                        alt="Profile image">
                                    <p class="mb-1 mt-3" style="font-size: 20px; font-weight: bold; color: #1e1e1e">
                                        {{ $user->firstname }} {{ $user->lastname }}</p>
                                    <p class="mb-0" style="font-size: 17px">{{ $user->email }}</p>
                                </div>
                                <a href="{{ route('freelancer.profile') }}" class="dropdown-item mb-2">
                                    <i class="fa-regular fa-user"
                                        style="font-size: 17px; color: #29B2FE; margin-right: 10px"></i>
                                    My Profile
                                </a>

                                <a class="dropdown-item" href="{{ route('logout') }}">
                                    <i class="fa-solid fa-power-off"
                                        style="font-size: 17px; color: #29B2FE; margin-right: 10px"></i>
                                    SignOut
                                </a>
                            </div>
                        </li>
                    </ul>
                    <button class="navbar-toggler navbar-toggler-right d-md-none ms-2" type="button"
                        data-bs-toggle="collapse" data-bs-target="#navigateMenu">
                        <i class="fa-solid fa-bars"></i>
                    </button>
                </div>
            </div>
        </nav>
        <nav class="bottom-navbar collapse d-md-block" id="navigateMenu">
            <div class="container">
                <ul class="nav page-navigation">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('freelancer') ? 'active' : '' }}"
                            href="{{ route('freelancer') }}">
                            <i class="fa-solid fa-house"></i>
                            <span class="menu-title">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('freelancer/lists*') ? 'active' : '' }}"
                            href="{{ route('freelancer.myLists') }}">
                            <i class="fa-solid fa-list-check"></i>
                            <span class="menu-title">Lists</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('freelancer/inbox*') ? 'active' : '' }}"
                            href="{{ route('freelancer.inbox') }}">
                            <i class="fa-solid fa-message"></i>
                            <span class="menu-title">Inbox</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('feedback*') ? 'active' : '' }}"
                            href="{{ route('freelancer.finishedJob') }}">
                            <i class="fa-solid fa-comment-dots"></i>
                            <span class="menu-title">Feedback</span>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
    <div style=" padding-top: 170px; padding-bottom: 50px; background: #FAFBFD;">
        @yield('main-content')
        <div class="shortcut-buttons">
            <a href="{{ route('freelancer') }}" class="shortcut-button" title="Dashboard">
                <i class="fas fa-home"></i>
            </a>
            <a href="{{ route('freelancer.myLists') }}" class="shortcut-button" title="My lists">
                <i class="fa-solid fa-list-check"></i>
            </a>
            <a href="{{ route('freelancer.inbox') }}" class="shortcut-button" title="Inbox">
                <i class="fa-solid fa-message"></i>
            </a>
            <a href="{{ route('freelancer.finishedJob') }}" class="shortcut-button" title="Finished jobs">
                <i class="fa-solid fa-comment-dots"></i>
            </a>
        </div>
    </div>
    <div class="footer text-center text-lg-start text-white" style="background-color: #181824">
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
            <a class="text-white" href="{{ route('freelancer') }}">felance.com</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

</body>

</html>
