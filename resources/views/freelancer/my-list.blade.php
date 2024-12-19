@extends('freelancer.master')
@section('title', 'Freelancer| Lists')

@section('main-content')
    <div class="container profile">
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert" id="alert-error">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session('status'))
            <div class="alert alert-success alert-dismissible fade show" role="alert" id="alert-success">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                {{ session('status') }}
            </div>
        @endif

        <div class="row">
            <div class="col-lg-3 col-md-4 col-12 mb-20">
                <div class="position-sticky" style="top: 200px">
                    <div class="box box-widget widget-user-2">
                        <div class="widget-user-header bg-secondary-light">
                            <div class="widget-user-image">
                                <img class="rounded-circle bg-danger" src="{{ asset($freelancer->avatar) }}"
                                    alt="User Avatar">
                            </div>
                            <h3 class="widget-user-username">{{ $user->firstname }} {{ $user->lastname }}</h3>
                            <h6 class="widget-user-desc fs-14 text-fade" style="text-transform: capitalize">
                                {{ $user->status }}</h6>
                        </div>
                        <div class="box-footer">
                            <ul class="nav d-block fs-16" id="pills-tab23" role="tablist">
                                <li class="nav-item">
                                    <a class="py-10 nav-link {{ request('tab') != 'applied' ? 'active' : '' }}"
                                     id="pills-favorite-tab" data-bs-toggle="pill"
                                        href="#pills-favorite" role="tab" aria-controls="pills-favorite"
                                        aria-selected="true">
                                        <i class="fa-regular fa-heart"></i>
                                        <span class="path2"></span></span>Favorites
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="py-10 nav-link {{ request('tab') == 'applied' ? 'active' : '' }}" 
                                     id="pills-appliedJob-tab" data-bs-toggle="pill"
                                        href="#pills-appliedJob" role="tab" aria-controls="pills-appliedJob"
                                        aria-selected="true">
                                        <i class="fa-solid fa-briefcase"></i>
                                        <span class="path2"></span></span>
                                        Applied Job
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-9 col-md-8 col-12">
                <div class="box">
                    <div class="box-body">
                        <div class="tab-content" id="pills-tabContent23">
                            <div class="tab-pane fade {{ request('tab') != 'applied' ? 'show active' : '' }}" id="pills-favorite" role="tabpanel"
                                aria-labelledby="pills-favorite-tab">
                                <div class="row">
                                    <div class="col-12">
                                        <h4 class="box-title text-primary fs-18" style="color: #2196f3">
                                            <i class="fa-regular fa-heart"></i>
                                            Favorites
                                        </h4>
                                        <hr class="my-15">
                                        @if ($favoriteJobs->count() > 0)
                                            @foreach ($favoriteJobs as $favorite)
                                                <div class="box">
                                                    <div class="box-body">
                                                        <div class="d-lg-flex justify-content-between">
                                                            <div class="w-100">
                                                                <div class="d-flex align-items-center"
                                                                    style="margin-bottom: 30px">
                                                                    <div class="me-15">
                                                                        <img src="{{ asset($favorite->job->company_logo) }}"
                                                                            class="avatar avatar-lg me-3">
                                                                    </div>
                                                                    <div class="d-flex flex-column">
                                                                        <a href="#" class="text-dark mb-1"
                                                                            style="text-decoration: none; font-size: 20px">
                                                                            {{ $favorite->job->short_describe }}
                                                                        </a>
                                                                        <span class="fs-14">
                                                                            {{ $favorite->job->company_name }} - 
                                                                            <span class="text-fade">{{ $favorite->job->location }}
                                                                                <em><small>{{ $favorite->job->created_at->diffForHumans() }}</small></em>
                                                                            </span>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                                <div
                                                                    class="d-lg-flex align-items-center justify-content-between">
                                                                    <div class="d-lg-flex d-block align-items-center">
                                                                        <h6 class="d-inline-block mb-0 rounded fs-14 mt-2"
                                                                            style="background-color: #e9edf2; padding: 5px 10px; color: #172b4c">
                                                                            <span>Salary:</span> ${{ $favorite->job->salary_min }} -
                                                                            ${{ $favorite->job->salary_max }}
                                                                        </h6>
                                                                        <h6 class="d-inline-block mb-0 rounded mx-10 my-0 fs-14 mt-2"
                                                                            style="background-color: #e9edf2; padding: 5px 10px; color: #172b4c">
                                                                            <span>Openings Position:</span>
                                                                            {{ $favorite->job->openings_position }}
                                                                        </h6>
                                                                        <h6 class="d-inline-block mb-0 rounded fs-14 mt-2"
                                                                            style="background-color: #e9edf2; padding: 5px 10px; color: #172b4c">
                                                                            <span>Experience:</span>
                                                                            {{ $favorite->job->experience_required }}+ year
                                                                        </h6>
                                                                    </div>
                                                                    <div class="ms-lg-10">
                                                                        <a href="{{ route('freelancer.jobDetail', ['job_id' => $favorite->job->job_id]) }}"
                                                                            class="btn btn-sm mt-lg-0 mt-2"
                                                                            style="background-color: #e4f3ff; color: #2196f3; margin-left: 10px">
                                                                            More Info
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="position-relative w-xl-300 w-lg-250 ps-lg-20 bs-1 ms-lg-20">
                                                                <h4 class="mt-lg-0 mt-25 mb-25">
                                                                    <small class="text-fade fs-12">Openings
                                                                        Position</small><br>
                                                                    {{ $favorite->job->job_title }}
                                                                </h4>
                                                                <form action="{{ route('freelancer.applyJob') }}" method="POST">
                                                                    @csrf
                                                                    <input type="hidden" name="job_id" value="{{ $favorite->job->job_id }}">
                                                                    <button id="apply-btn" type="submit" class="btn w-100 btn-primary">
                                                                        Apply Now
                                                                    </button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                            <div class="d-flex justify-content-center">
                                                <div class="custom-pagination">
                                                    {{ $favoriteJobs->links('pagination::bootstrap-5') }}
                                                </div>
                                            </div>
                                        @else
                                            <div class="text-center py-5">
                                                <i class="fa-regular fa-heart fa-3x mb-3" style="color: #ccc;"></i>
                                                <h5>No favorite jobs yet</h5>
                                                <p>Jobs you favorite will appear here</p>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade {{ request('tab') == 'applied' ? 'show active' : '' }}" id="pills-appliedJob" role="tabpanel"
                                aria-labelledby="pills-appliedJob-tab">
                                <div class="row">
                                    <div class="col-12">
                                        <h4 class="box-title text-primary fs-18" style="color: #2196f3">
                                            <i class="fa-solid fa-briefcase"></i>
                                            Applied Job
                                        </h4>
                                        <hr class="my-15">
                                        @if ($applicants->count() > 0)
                                            @foreach ($applicants as $applicant)
                                                <div class="box">
                                                    <div class="box-body">
                                                        <div class="d-lg-flex justify-content-between">
                                                            <div class="w-100">
                                                                <div class="d-flex align-items-center"
                                                                    style="margin-bottom: 30px">
                                                                    <div class="me-15">
                                                                        <img src="{{ asset($applicant->job->company_logo) }}"
                                                                            class="avatar avatar-lg me-3">
                                                                    </div>
                                                                    <div class="d-flex flex-column">
                                                                        <a href="#" class="text-dark mb-1"
                                                                            style="text-decoration: none; font-size: 20px">
                                                                            {{ $applicant->job->short_describe }}
                                                                            <span
                                                                                style="background-color: #e9f5ea; color: #848784; font-size: 75%; padding: 2px 10px; border-radius: 5px; margin-left: 10px">
                                                                                {{ ucfirst($applicant->status) }}
                                                                            </span>
                                                                        </a>
                                                                        <span class="fs-14">
                                                                            {{ $applicant->job->company_name }} - 
                                                                            <span class="text-fade">{{ $applicant->job->location }}
                                                                                <em><small>{{ $applicant->job->created_at->diffForHumans() }}</small></em>
                                                                            </span>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                                <div
                                                                    class="d-lg-flex align-items-center justify-content-between">
                                                                    <div class="d-lg-flex d-block align-items-center">
                                                                        <h6 class="d-inline-block mb-0 rounded fs-14 mt-2"
                                                                            style="background-color: #e9edf2; padding: 5px 10px; color: #172b4c">
                                                                            <span>Salary:</span> ${{ $applicant->job->salary_min }} -
                                                                            ${{ $applicant->job->salary_max }}
                                                                        </h6>
                                                                        <h6 class="d-inline-block mb-0 rounded mx-10 my-0 fs-14 mt-2"
                                                                            style="background-color: #e9edf2; padding: 5px 10px; color: #172b4c">
                                                                            <span>Openings Position:</span>
                                                                            {{ $applicant->job->openings_position }}
                                                                        </h6>
                                                                        <h6 class="d-inline-block mb-0 rounded fs-14 mt-2"
                                                                            style="background-color: #e9edf2; padding: 5px 10px; color: #172b4c">
                                                                            <span>Experience:</span>
                                                                            {{ $applicant->job->experience_required }}+ year
                                                                        </h6>
                                                                    </div>
                                                                    <div class="ms-lg-10">
                                                                        <a href="{{ route('freelancer.jobDetail', ['job_id' => $applicant->job->job_id]) }}"
                                                                            class="btn btn-sm mt-lg-0 mt-2"
                                                                            style="background-color: #e4f3ff; color: #2196f3; margin-left: 10px">
                                                                            More Info
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="position-relative w-xl-300 w-lg-250 ps-lg-20 bs-1 ms-lg-20">
                                                                <h4 class="mt-lg-0 mt-25 mb-25">
                                                                    <small class="text-fade fs-12">Openings
                                                                        Position</small><br>
                                                                    {{ $applicant->job->job_title }}
                                                                </h4>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                            <div class="d-flex justify-content-center">
                                                <div class="custom-pagination">
                                                    {{ $applicants->appends(['tab' => 'applied'])->links('pagination::bootstrap-5') }}
                                                </div>
                                            </div>
                                        @else
                                            <div class="text-center py-5">
                                                <i class="fa-solid fa-briefcase fa-3x mb-3" style="color: #ccc;"></i>
                                                <h5>No pending jobs yet</h5>
                                                <p>Jobs you applied will appear here</p>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function togglePasswordVisibility(passwordId, iconId) {
            const passwordField = document.getElementById(passwordId);
            const toggleIcon = document.getElementById(iconId);

            if (passwordField.type === "password") {
                passwordField.type = "text";
                toggleIcon.classList.remove("fa-eye-slash");
                toggleIcon.classList.add("fa-eye");
            } else {
                passwordField.type = "password";
                toggleIcon.classList.remove("fa-eye");
                toggleIcon.classList.add("fa-eye-slash");
            }
        }

        setTimeout(function() {
            var alertError = document.getElementById('alert-error');
            var alertSuccess = document.getElementById('alert-success');

            if (alertError) {
                alertError.classList.remove('show');
                alertError.classList.add('fade');
            }

            if (alertSuccess) {
                alertSuccess.classList.remove('show');
                alertSuccess.classList.add('fade');
            }
        }, 3000)
    </script>
@endsection
