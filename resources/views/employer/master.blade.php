<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('employer_assets/css/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/perfect-scrollbar@1.5.0/css/perfect-scrollbar.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/perfect-scrollbar@1.5.0/dist/perfect-scrollbar.min.js"></script>

</head>

<body>
    <div class="horizontal-menu">
        <nav class="navbar top-navbar col-lg-12 col-12 p-0">
            <div class="container">
                <div class="navbar-brand-wrapper d-flex"
                    style="text-align: center; align-items: center; justify-content: center">
                    <a class="navbar-brand" href="{{ route('employer')}}">
                        <img src="{{ asset('welcome_assets/images/logo_name.png') }}" alt="logo" /></a>
                </div>
                <div class="navbar-menu-wrapper d-flex" style="align-items: center; justify-content: end;">
                    <ul class="navbar-nav d-flex" style="flex-direction: row">
                        <li class="nav-item">
                            <a class="nav-link d-flex dropdown-toggle" id="UserDropdown" href="#"
                                style="align-items: center" data-bs-toggle="dropdown" aria-expanded="false">
                                <img class="img-xs rounded-circle me-2"
                                    src="{{ asset($employer->company_logo)}}"
                                    alt="Profile image">
                                <span class="d-none d-md-inline"> {{ $user->firstname}} {{ $user->lastname}} </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right navbar-dropdown"
                                aria-labelledby="UserDropdown">
                                <div class="dropdown-header text-center">
                                    <img class="img-md rounded-circle"
                                        src="{{ asset($employer->company_logo)}}"
                                        alt="Profile image">
                                    <p class="mb-1 mt-3"
                                        style="font-size: 20px; font-weight: bold; color: #1e1e1e">
                                        {{ $user->firstname}} {{ $user->lastname}}</p>
                                    <p class="mb-0" style="font-size: 17px">{{ $user->email}}</p>
                                </div>
                                <a class="dropdown-item">
                                    <a href="{{ route('employer.profile')}}" class="dropdown-item mb-2">
                                        <i class="fa-regular fa-user"
                                            style="font-size: 17px; color: #29B2FE; margin-right: 10px"></i>
                                        My Profile
                                    </a>

                                    <a class="dropdown-item" href="{{ route('logout')}}">
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
                        <a class="nav-link {{ request()->is('employer') ? 'active' : '' }}" href="{{ route('employer')}}">
                            <i class="fa-solid fa-house"></i>
                            <span class="menu-title">Dashboard</span>
                        </a>
                    </li>
                    {{-- <li class="nav-item">
                        <a class="nav-link {{ request()->is('employer/lists*') ? 'active' : '' }}" href="{{ route('freelancer.myLists')}}">
                            <i class="fa-solid fa-list-check"></i>
                            <span class="menu-title">Lists</span>
                        </a>
                    </li> --}}
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('employer/inbox*') ? 'active' : '' }}" href="{{ route('employer.inbox')}}">
                            <i class="fa-solid fa-message"></i>
                            <span class="menu-title">Inbox</span>
                        </a>
                    </li>
                    {{-- <li class="nav-item">
                        <a class="nav-link {{ request()->is('feedback*') ? 'active' : '' }}" href="">
                            <i class="fa-solid fa-comment-dots"></i>
                            <span class="menu-title">Feedback</span>
                        </a>
                    </li> --}}
                </ul>
            </div>
        </nav>
    </div>
    <div style=" padding-top: 170px; padding-bottom: 50px; background: #FAFBFD;">
        @yield('main-content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

</body>

</html>