@extends('freelancer.master')
@section('title', 'Freelancer| Main Dashboard')

@section('main-content')
    <div class="container job-detail">
        <div class="row">
            <div class="col-xl-8 col-md-7 col-12">
                <div class="d-lg-flex" style="margin-bottom: 30px">
                    <div class="left-inner text-center">
                        <div class="job-detail-thumbnail">
                            <a href="#">
                                <img width="180" height="75" src="{{ asset($job->company_logo) }}" class="img-thumbnail"
                                    style="max-width: 170px; background: transparent; border: none">
                            </a>
                        </div>
                        <div class="clearfix text-center">
                            <a href="{{ route('freelancer') }}" class="btn-link my-10 d-block">View all jobs
                                <i class="fa-solid fa-angle-right"></i>
                            </a>
                        </div>
                    </div>
                    <div class="inner-info ps-lg-30 mt-20">
                        <a class="text-success" style="font-weight: 500">{{ $job->type }}</a>
                        <div>
                            <h3 class="job-detail-title d-inline-block mt-0 mb-10">{{ $job->job_title }}</h3>
                        </div>
                        <div class="job-date-author fs-14 mb-10">
                            {{ $job->created_at->diffForHumans() }} by
                            <a class="text-primary"
                                href="{{ route('freelancer.companyProfile', $job->user_id) }}">{{ $job->company_name }}
                            </a>
                        </div>
                        <div class="job-metas d-flex align-items-center">
                            <div class="job-location fs-18" style="margin-right: 20px">
                                <i class="fa-solid fa-location-dot"></i>
                                {{ $job->location }}
                            </div>
                            <div class="job-salary fs-18">
                                <i class="fa-regular fa-money-bill-1"></i>
                                $<span class="price-text">{{ $job->salary_min }}</span> - $<span
                                    class="price-text">{{ $job->salary_max }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box">
                    <div class="box-body">
                        <h4 class="box-title mb-0 fw-500">Job Description</h4>
                        <hr>
                        <ul class="list list-mark">
                            @foreach ($description as $item)
                                <li>{{ $item }}</li>
                            @endforeach
                        </ul>

                        <h4 class="box-title mb-0 fw-500">Responsibilities Include:</h4>
                        <hr>
                        <ul class="list list-mark mb-25">
                            @foreach ($responsibilities as $item)
                                <li>{{ $item }}</li>
                            @endforeach
                        </ul>
                        <h4 class="box-title mb-0 fw-500">Background, Skills & Experience</h4>
                        <hr>
                        <ul class="list list-mark">
                            @foreach ($background as $item)
                                <li>{{ $item }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="related-job">
                    <h4 class="box-title mb-20 fw-500">Related Job</h4>
                    <div id="job-list" class="related-jobs-slider tab-content">
                        @foreach ($relatedJobs as $relatedJob)
                            @if ($relatedJob->finish === 0 && $relatedJob->status == 'Approved')
                                <div class="box">
                                    <div class="box-body" style="padding: 0">
                                        <div class="d-lg-flex justify-content-between">
                                            <div class="w-100">
                                                <div class="d-flex align-items-center" style="margin-bottom: 30px">
                                                    <div class="me-15">
                                                        <img src="{{ asset($relatedJob->company_logo) }}"
                                                            class="avatar avatar-lg me-3">
                                                    </div>
                                                    <div class="d-flex flex-column">
                                                        <div href="#" class="text-dark mb-1"
                                                            style="text-decoration: none; font-size: 20px">
                                                            <span class="fw-500">{{ $relatedJob->short_describe }}</span>
                                                        </div>
                                                        <span class="fs-14">
                                                            <a
                                                                href="{{ route('freelancer.companyProfile', $relatedJob->user_id) }}">
                                                                {{ $relatedJob->company_name }}
                                                            </a>
                                                            -
                                                            <span class="text-fade">{{ $relatedJob->location }}
                                                                <em><small>{{ $relatedJob->created_at->diffForHumans() }}</small></em>
                                                            </span>
                                                    </div>
                                                </div>
                                                <div class="d-lg-flex align-items-center justify-content-between">
                                                    <div class="d-lg-flex d-block align-items-center">
                                                        <h6 class="d-inline-block mb-0 rounded fs-14 mt-2"
                                                            style=" background-color: #e9edf2; 
                                            padding: 5px 10px;
                                            color: #172b4c">
                                                            <span>Salary:</span> ${{ $relatedJob->salary_min }} -
                                                            ${{ $relatedJob->salary_max }}
                                                        </h6>
                                                        <h6 class="d-inline-block mb-0 rounded mx-10 my-0 fs-14 mt-2"
                                                            style=" background-color: #e9edf2; 
                                                padding: 5px 10px;
                                                color: #172b4c">
                                                            <span>Openings Position:</span>
                                                            {{ $relatedJob->openings_position }}
                                                        </h6>
                                                        <h6 class="d-inline-block mb-0 rounded fs-14 mt-2"
                                                            style=" background-color: #e9edf2; 
                                                padding: 5px 10px;
                                                color: #172b4c">
                                                            <span>Experience:</span>
                                                            {{ $relatedJob->experience_required }}+ year
                                                        </h6>
                                                    </div>
                                                    <div class="ms-lg-10">
                                                        <a href="{{ route('freelancer.jobDetail', ['job_id' => $relatedJob->job_id]) }}"
                                                            class="btn btn-sm mt-lg-0 mt-2"
                                                            style="background-color: #e4f3ff; color: #2196f3; margin-left: 10px">More
                                                            Info</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="position-relative w-xl-300 w-lg-250 ps-lg-20 bs-1 ms-lg-20">
                                                <h4 class="mt-lg-0 mt-25 mb-25">
                                                    <small class="text-fade fs-12">Openings Postition</small><br>
                                                    {{ $relatedJob->job_title }}
                                                </h4>
                                                <form action="{{ route('freelancer.applyJob') }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="job_id" value="{{ $relatedJob->job_id }}">
                                                    @php
                                                        $hasApplied = \App\Models\Applicant::where(
                                                            'user_id',
                                                            Auth::id(),
                                                        )
                                                            ->where('job_id', $job->job_id)
                                                            ->exists();
                                                    @endphp
                                                    <button id="apply-btn" type="submit" class="btn w-100 btn-primary"
                                                        {{ $hasApplied ? 'disabled' : '' }}>
                                                        {{ $hasApplied ? 'Already Applied' : 'Apply Now' }}
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-5 col-sm-12">
                <div class="course-detail-bx">
                    <div class="box box-body">
                        <div class="course-price">
                            <div class="mb-2">
                                <p class="text-danger text-center">
                                    <i class="fa-regular fa-clock"></i>
                                    Application ends: <strong>{{ date('d-m-Y', strtotime($job->end_date)) }}</strong>
                                </p>
                            </div>
                        </div>
                        <div class="text-center">
                            <button id="favorite-btn" data-job-id="{{ $job->job_id }}" type="button"
                                class="btn w-100 mb-10" style="border: 1px solid #eee">
                                <i id="favorite-icon" class="fa-heart {{ $isFavorited ? 'fa-solid' : 'fa-regular' }}"
                                    style="color: {{ $isFavorited ? 'red' : '' }}"></i>
                                Favorite
                            </button>

                            <form action="{{ route('freelancer.applyJob') }}" method="POST">
                                @csrf
                                <input type="hidden" name="job_id" value="{{ $job->job_id }}">
                                @php
                                    $hasApplied = \App\Models\Applicant::where('user_id', Auth::id())
                                        ->where('job_id', $job->job_id)
                                        ->exists();
                                @endphp
                                <button id="apply-btn" type="submit" class="btn w-100 btn-success"
                                    {{ $hasApplied ? 'disabled' : '' }}>
                                    {{ $hasApplied ? 'Already Applied' : 'Apply Now' }}
                                    <i class="fa-solid fa-chevron-right"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                    <h4>Job Information</h4>
                    <div class="box box-body">
                        <div class="d-flex align-items-center mb-30">
                            <div class="me-15">
                                <i class="fa-solid fa-wallet"></i>
                            </div>
                            <div class="details">
                                <div class="fs-18">Offered Salary</div>
                                <div class="fs-18 text-fade">$<span class="price-text">{{ $job->salary_min }}</span> -
                                    $<span class="price-text">{{ $job->salary_max }}</span></div>
                            </div>
                        </div>
                        <div class="d-flex align-items-center mb-30">
                            <div class="me-15">
                                <i class="fa-solid fa-venus-mars"></i>
                            </div>
                            <div class="details">
                                <div class="fs-18">Gender</div>
                                <div class="fs-18 text-fade">{{ $job->gender }}</div>
                            </div>
                        </div>
                        <div class="d-flex align-items-center mb-30">
                            <div class="me-15">
                                <i class="fa-solid fa-list"></i>
                            </div>
                            <div class="details">
                                <div class="fs-18">Category</div>
                                <div class="fs-18 text-fade">{{ $job->categories }}</div>
                            </div>
                        </div>
                        <div class="d-flex align-items-center mb-30">
                            <div class="me-15">
                                <i class="fa-solid fa-book-open"></i>
                            </div>
                            <div class="details">
                                <div class="fs-18">Qualification</div>
                                <div class="fs-18 text-fade">{{ $job->qualification }}</div>
                            </div>
                        </div>
                        <div class="d-flex align-items-center mb-30">
                            <div class="me-15">
                                <i class="fa-solid fa-gear"></i>
                            </div>
                            <div class="details">
                                <div class="fs-18">Career Level</div>
                                <div class="fs-18 text-fade">{{ $job->career_level }}</div>
                            </div>
                        </div>
                    </div>
                    <h4>Share Link:</h4>
                    <div class="box box-body">
                        <div class="d-flex gap-items-2">
                            <button class="btn btn-social-icon btn-facebook">
                                <i class="fa-brands fa-facebook-f"></i>
                            </button>
                            <button class="btn btn-social-icon btn-twitter">
                                <i class="fa-brands fa-x-twitter"></i>
                            </button>
                            <button class="btn btn-social-icon btn-linkedin">
                                <i class="fa-brands fa-linkedin"></i>
                            </button>
                            <button class="btn btn-social-icon btn-instagram">
                                <i class="fa-brands fa-instagram"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('favorite-btn').addEventListener('click', function() {
            const jobId = this.getAttribute('data-job-id');
            const favoriteIcon = document.getElementById('favorite-icon');

            $.ajax({
                url: '/freelancer/favorite-job',
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    job_id: jobId
                },
                success: function(data) {
                    if (data.status === 'success') {
                        favoriteIcon.classList.toggle('fa-regular');
                        favoriteIcon.classList.toggle('fa-solid');
                        favoriteIcon.style.color = data.action === 'favorited' ? 'red' : '';
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error:', error);
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('.related-jobs-slider').slick({});
        });
    </script>

@endsection
