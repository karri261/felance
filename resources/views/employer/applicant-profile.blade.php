@extends('employer.master')
@section('title', 'Employer| Applicants Profile')

@section('main-content')
    <div class="container appProfile">
        <div class="row">
            <div class="col-lg-3 col-md-4 col-12">
                <div class="box position-sticky" style="top: 150px">
                    <div style="padding: 0 15px; margin-top: 10px">
                        <a href="{{ route('employer.applicantList', ['job_id' => $job->job_id]) }}"
                            style="text-decoration: none; color: #1e1e1e; margin-top: 10px;">
                            <i class="fa-solid fa-angle-left"></i> Other
                        </a>
                        <hr style="margin-top: 10px;">
                    </div>
                    <div class="box-body text-center" style="position: relative;">
                        <button class="btn-report" data-bs-toggle="modal" data-bs-target="#reportModal{{ $applicant->id }}">
                            <i class="fa-regular fa-flag"></i>
                        </button>
                        <div class="modal fade" id="reportModal{{ $applicant->id }}" tabindex="-1"
                            aria-labelledby="reportModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form action="{{ route('employer.report') }}" method="POST">
                                        @csrf
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="reportModalLabel">Report
                                                {{ $applicant->user->firstname }} {{ $applicant->user->lastname }}</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <input type="hidden" name="reported_user_id" value="{{ $applicant->user_id }}">
                                            <div class="mb-3">
                                                <select class="form-select" id="title" name="title"
                                                    onchange="toggleOtherReason(this)" required>
                                                    <option value="" disabled selected>-- Select a reason --</option>
                                                    <option value="Inappropriate language">Inappropriate language</option>
                                                    <option value="Spam">Spam</option>
                                                    <option value="Fraudulent behavior">Fraudulent behavior</option>
                                                    <option value="Harassment">Harassment</option>
                                                    <option value="Other">Other</option>
                                                </select>
                                            </div>

                                            <div class="mb-3">
                                                <label for="detail" class="form-label" style="float: left">Reason for
                                                    Reporting</label>
                                                <textarea class="form-control" id="reason" name="detail" rows="4" required></textarea>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Cancel</button>
                                            <button type="submit" class="btn btn-danger">Submit Report</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="mb-20 mt-20">
                            <img src="{{ asset($freelancer->avatar) }}" width="150" class="rounded-circle"
                                alt="user">
                            <h4 class="mt-20 mb-0">{{ $userView->firstname }} {{ $userView->lastname }}</h4>
                            <div href="mailto:dummy@gmail.com">{{ $userView->email }}</div>
                        </div>
                        <div class="social-links d-flex">
                            <a href="{{ $freelancer->facebook }}" target="_blank">
                                <i class="fa-brands fa-facebook"></i>
                            </a>
                            <a href="{{ $freelancer->instagram }}" target="_blank">
                                <i class="fa-brands fa-instagram"></i>
                            </a>
                            <a href="{{ $freelancer->twitter }}" target="_blank">
                                <i class="fa-brands fa-square-x-twitter"></i>
                            </a>
                            <a href="{{ $freelancer->linkedin }}" target="_blank">
                                <i class="fa-brands fa-linkedin"></i>
                            </a>
                        </div>
                        <ul class="rating-star">
                            @php
                                $score = $freelancer->rating;
                                $fullStars = floor($score);
                                $halfStar = $score - $fullStars >= 0.5;
                                $emptyStars = 5 - $fullStars - ($halfStar ? 1 : 0);
                            @endphp

                            @for ($i = 0; $i < $fullStars; $i++)
                                <li class="active"><i class="fa fa-star"></i></li>
                            @endfor

                            @if ($halfStar)
                                <li class="active half"><i class="fa fa-star-half-alt"></i></li>
                            @endif

                            @for ($i = 0; $i < $emptyStars; $i++)
                                <li><i class="fa fa-star" style="color: #ddd"></i></li>
                            @endfor

                            <span style="margin-left: 5px">({{ $freelancer->rating }})</span>
                        </ul>

                        @if ($applicant->status === 'pending' && $applicant->job->finish === 0)
                            <hr>
                            <div class="btn-list d-flex" style="justify-content: space-evenly">
                                <form action="{{ route('applicant.browserRequest', $applicant->id) }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="action" value="accept">
                                    <button class="btn btn-success">
                                        <i class="fa-solid fa-check"></i>
                                    </button>
                                </form>

                                <form action="{{ route('applicant.browserRequest', $applicant->id) }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="action" value="reject">
                                    <button class="btn btn-danger">
                                        <i class="fa-solid fa-x"></i>
                                    </button>
                                </form>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-lg-9 col-md-8 col-12">
                <div class="box">
                    <div class="box-body">
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="pills-personal" role="tabpanel"
                                aria-labelledby="pills-personal-tab">
                                <h4 class="box-title fs-18 mb-0">
                                    Personal Details
                                </h4>
                                <hr>
                                <ul class="list-unstyled clearfix fs-14">
                                    <li class="w-md-p50 float-start pb-10">
                                        <a href="" class="text-dark d-flex justify-content-between pe-50">
                                            <span class="fw-500">Name: </span>
                                            <span class="text-muted">{{ $userView->firstname }}
                                                {{ $userView->lastname }}</span>
                                        </a>
                                    </li>
                                    <li class="w-md-p50 float-start pb-10">
                                        <a href="" class="text-dark d-flex justify-content-between">
                                            <span class="fw-500">Address: </span>
                                            <span class="text-muted">{{ $freelancer->address }}</span>
                                        </a>
                                    </li>
                                    <li class="w-md-p50 float-start pb-10">
                                        <a href="" class="text-dark d-flex justify-content-between pe-50">
                                            <span class="fw-500">Languages: </span>
                                            <span class="text-muted">{{ $freelancer->languages }}</span>
                                        </a>
                                    </li>
                                    <li class="w-md-p50 float-start pb-10">
                                        <a href="" class="text-dark d-flex justify-content-between">
                                            <span class="fw-500">Email: </span>
                                            <span class="text-muted">{{ $userView->email }}</span>
                                        </a>
                                    </li>
                                    <li class="w-md-p50 float-start pb-10">
                                        <a href="" class="text-dark d-flex justify-content-between pe-50">
                                            <span class="fw-500">Phone: </span>
                                            <span class="text-muted">{{ $freelancer->phone_number }}</span>
                                        </a>
                                    </li>
                                    <li class="w-md-p50 float-start pb-10">
                                        <a href="{{ asset($freelancer->cv_path) }}"
                                            class="text-dark d-flex justify-content-between" target="_blank">
                                            <span class="fw-500">CV :</span>
                                            <span class="text-muted">
                                                <i class="fa-solid fa-file-pdf text-danger"></i> Download/View
                                            </span>
                                        </a>
                                    </li>
                                </ul>
                                <h4 class="box-title fs-18 mb-0 mt-20">
                                    About Me
                                </h4>
                                <hr>
                                <p class="fs-14" style="text-align: justify">
                                    {{ $freelancer->bio }}
                                </p>
                                <h4 class="box-title fs-18 mb-0 mt-20">
                                    Featured Image
                                </h4>
                                <hr>
                                <div class="popup-gallery d-flex justify-content-center">
                                    
                                    <div class="row" style="justify-content: center">
                                        @if (!empty($images) && is_array($images))
                                            @foreach ($images as $image)
                                                <div style="width: 300px; height: 300px; margin-top: 20px">
                                                    <img src="{{ asset($image) }}"
                                                        style="width: 100%; height: 100%; object-fit: cover">
                                                </div>
                                            @endforeach
                                        @else
                                            <p class="text-muted fs-14">No images available</p>
                                        @endif
                                    </div>
                                    <div id="feedback"></div>
                                </div>
                                <h4 class="box-title fs-18 mb-0">
                                    Feedback
                                </h4>
                                <hr>
                                <div>
                                    @if ($completedJobs->isEmpty())
                                        <div class="text-center" style="padding: 70px 0">
                                            <i class="fa-solid fa-briefcase" style="color: #ccc;"></i>
                                            No jobs at the moment.
                                        </div>
                                    @else
                                        @foreach ($completedJobs as $job)
                                            <div class="rating-box d-flex">
                                                <div class="company-logo" style="margin-right: 10px">
                                                    <img src="{{ asset($job->company_logo) }}" alt=""
                                                        style="width: 63px; height: 63px;">
                                                </div>
                                                <div class="rating-main">
                                                    <h6 class="company-name" style="margin-bottom: 0">
                                                        {{ $job->company_name }}
                                                    </h6>
                                                    @foreach ($job->applicants as $applicant)
                                                        <div class="rating-inf d-flex align-items-center">
                                                            <ul class="rating-star"
                                                                style="font-size: 12px; justify-content: flex-start">
                                                                @php
                                                                    $score = $applicant->rating->score;
                                                                    $fullStars = floor($score);
                                                                    $halfStar = $score - $fullStars >= 0.5;
                                                                    $emptyStars = 5 - $fullStars - ($halfStar ? 1 : 0);
                                                                @endphp

                                                                @for ($i = 0; $i < $fullStars; $i++)
                                                                    <li class="active"><i class="fa fa-star"></i></li>
                                                                @endfor

                                                                @if ($halfStar)
                                                                    <li class="active half"><i
                                                                            class="fa fa-star-half-alt"></i>
                                                                    </li>
                                                                @endif

                                                                @for ($i = 0; $i < $emptyStars; $i++)
                                                                    <li><i class="fa fa-star" style="color: #ddd"></i>
                                                                    </li>
                                                                @endfor
                                                            </ul>
                                                            <span style="font-size: 14px; color: #5c5c5c">
                                                                | Job name: {{ $job->job_title }}
                                                            </span>
                                                        </div>
                                                        <div class="rating-comment">
                                                            Comment: {{ $applicant->rating->comment }}
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                            <hr style="color: #b7b7b7; height: 50%;">
                                        @endforeach
                                        <div class="d-flex justify-content-center">
                                            <div class="custom-pagination">
                                                {{ $completedJobs->fragment('feedback')->links('pagination::bootstrap-5') }}
                                            </div>
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
@endsection
