@extends('admin.master')
@section('title', 'Felance Admin| Main Dashboard')

@section('main-content')
    <div class="main-panel">
        <div class="content-wrapper" style="padding-top: 0">
            <div class="row">
                <div class="col-sm-12">
                    <div class="home-tab">
                        <div class="d-sm-flex align-items-center justify-content-between border-bottom">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active ps-0" id="home-tab" data-bs-toggle="tab" href="#overview"
                                        role="tab" aria-controls="overview" aria-selected="true">Overview</a>
                                </li>
                            </ul>
                            <div>
                                <div class="btn-wrapper">
                                    {{-- <a href="#" class="btn btn-otline-dark" onclick="window.print()"> --}}
                                    <a href="#" class="btn btn-primary text-white me-0" onclick="window.print()">
                                        <i class="icon-printer"></i>
                                        Print
                                    </a>
                                    {{-- <a href="#" class="btn btn-primary text-white me-0">
                                        <i class="icon-download"></i>
                                        Export
                                    </a> --}}
                                </div>
                            </div>
                        </div>
                        <div class="tab-content tab-content-basic">
                            <div class="tab-pane fade show active" id="overview" role="tabpanel"
                                aria-labelledby="overview">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="statistics-details d-flex align-items-center justify-content-between">
                                            <div style="text-align: center">
                                                <p class="statistics-title">Jobs</p>
                                                <h3 class="rate-percentage">{{ $jobsCount }}</h3>
                                                <p class="text-success d-flex">
                                                    <span>{{ now()->format('d/m/Y') }}</span>
                                                </p>
                                            </div>
                                            <div style="text-align: center">
                                                <p class="statistics-title">Users</p>
                                                <h3 class="rate-percentage">{{ $usersCount }}</h3>
                                                <p class="text-success d-flex">
                                                    <span>{{ now()->format('d/m/Y') }}</span>
                                                </p>
                                            </div>
                                            <div style="text-align: center">
                                                @php
                                                    $freelancerPercentage =
                                                        $usersCount > 0 ? ($freelancersCount / $usersCount) * 100 : 0;
                                                @endphp
                                                <p class="statistics-title">Freelancers</p>
                                                <h3 class="rate-percentage">
                                                    {{ $freelancersCount }}
                                                </h3>
                                                <p class="text-fade">
                                                    <span>{{ number_format($freelancerPercentage, 2) }}%</span>
                                                </p>
                                            </div>
                                            <div style="text-align: center">
                                                @php
                                                    $employerPercentage =
                                                        $usersCount > 0 ? ($employersCount / $usersCount) * 100 : 0;
                                                @endphp
                                                <p class="statistics-title">Employers</p>
                                                <h3 class="rate-percentage">
                                                    {{ $employersCount }}
                                                </h3>
                                                <p class="text-fade">
                                                    <span>{{ number_format($employerPercentage, 2) }}%</span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-8 d-flex flex-column">
                                        <div class="row flex-grow">
                                            <div class="col-12 col-lg-4 col-lg-12 grid-margin stretch-card">
                                                <div class="card card-rounded">
                                                    <div class="card-body">
                                                        <div class="d-sm-flex justify-content-between align-items-start">
                                                            <div>
                                                                <h4 class="card-title card-title-dash">
                                                                    User Line Chart
                                                                </h4>
                                                            </div>
                                                            <div id="performanceLine-legend"></div>
                                                        </div>
                                                        <div class="chartjs-wrapper mt-4">
                                                            <canvas id="performanceLinee" width=""></canvas>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 d-flex flex-column">
                                        <div class="row flex-grow">
                                            <div class="col-md-6 col-lg-12 grid-margin stretch-card">
                                                <div class="card card-rounded">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div
                                                                    class="d-flex justify-content-between align-items-center mb-3">
                                                                    <div>
                                                                        <h4 class="card-title card-title-dash">Top
                                                                            Freelancer</h4>
                                                                    </div>
                                                                </div>
                                                                <div class="mt-3">
                                                                    @foreach ($topFreelancers as $topfl)
                                                                        <div
                                                                            class="wrapper d-flex align-items-center justify-content-between py-2 border-bottom">
                                                                            <div class="d-flex">
                                                                                <img class="img-sm rounded-10"
                                                                                    src="{{ asset($topfl->avatar) }}"
                                                                                    alt="profile">
                                                                                <div class="wrapper ms-3">
                                                                                    <p class="ms-1 mb-1 fw-bold">
                                                                                        {{ $topfl->user->firstname }}
                                                                                        {{ $topfl->user->lastname }}</p>
                                                                                    <small class="admin text-muted mb-0">
                                                                                        <ul class="rating-star">
                                                                                            @php
                                                                                                $score = $topfl->rating;
                                                                                                $fullStars = floor(
                                                                                                    $score,
                                                                                                );
                                                                                                $halfStar =
                                                                                                    $score -
                                                                                                        $fullStars >=
                                                                                                    0.5;
                                                                                                $emptyStars =
                                                                                                    5 -
                                                                                                    $fullStars -
                                                                                                    ($halfStar ? 1 : 0);
                                                                                            @endphp

                                                                                            @for ($i = 0; $i < $fullStars; $i++)
                                                                                                <li class="active"><i
                                                                                                        class="fa fa-star"></i>
                                                                                                </li>
                                                                                            @endfor

                                                                                            @if ($halfStar)
                                                                                                <li class="active half"><i
                                                                                                        class="fa fa-star-half-alt"></i>
                                                                                                </li>
                                                                                            @endif

                                                                                            @for ($i = 0; $i < $emptyStars; $i++)
                                                                                                <li><i class="fa fa-star"
                                                                                                        style="color: #ddd"></i>
                                                                                                </li>
                                                                                            @endfor

                                                                                            <span
                                                                                                style="margin-left: 5px">({{ $topfl->rating }})</span>
                                                                                        </ul>
                                                                                    </small>
                                                                                </div>
                                                                            </div>
                                                                            <div class="text-muted text-small">
                                                                                {{ $topfl->created_at->format('d/m/Y') }}
                                                                            </div>
                                                                        </div>
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
    </div>
    <script>
        new Chart(document.getElementById('performanceLinee').getContext('2d'), {
            type: 'line',
            data: {
                labels: @json($dates), // Dữ liệu ngày từ PHP
                datasets: [{
                    label: 'New Users',
                    data: @json($counts), // Dữ liệu số lượng người dùng mới từ PHP
                    borderColor: 'rgba(75, 192, 192, 1)', // Màu của đường biểu đồ
                    backgroundColor: 'rgba(75, 192, 192, 0.2)', // Màu nền dưới đường
                    fill: true // Tô màu khu vực dưới đường
                }]
            },
            options: {
                responsive: true,
                scales: {
                    x: {
                        title: {
                            display: true,
                            text: 'Date'
                        }
                    },
                    y: {
                        title: {
                            display: true,
                            text: 'Number of Users'
                        },
                        beginAtZero: true
                    }
                }
            },
        });
    </script>

@endsection
