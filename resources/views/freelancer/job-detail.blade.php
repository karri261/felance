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
                                    style="max-width: 170px;">
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
                            <a class="text-primary" href="#">{{ $job->company_name }}</a>
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
                        <p class="fs-16 mb-30">{{ $job->job_description }}</p>

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
                                <button id="apply-btn" type="submit" class="btn w-100 btn-success">
                                    Apply Now
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
@endsection
