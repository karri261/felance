@extends('freelancer.master')
@section('title', 'Freelancer| Finished Job')

@section('main-content')
    <div class="container">
        <div class="col-lg-12 col-md-8 col-12">
            <div class="tab-content" id="job-list">
                @if ($completedJobs->isEmpty())
                    <div class="text-center" style="padding: 70px 0">
                        <i class="fa-solid fa-briefcase" style="color: #ccc;"></i>
                        No jobs available at the moment.
                    </div>
                @else
                    @foreach ($completedJobs as $job)
                        <div class="box">
                            <div class="box-body">
                                <div class="d-lg-flex justify-content-between">
                                    <div class="w-100">
                                        <div class="d-flex align-items-center" style="margin-bottom: 30px">
                                            <div class="me-15">
                                                <img src="{{ asset($job->company_logo) }}" class="avatar avatar-lg me-3">
                                            </div>
                                            <div class="d-flex flex-column">
                                                <div href="#" class="text-dark mb-1"
                                                    style="text-decoration: none; font-size: 20px">
                                                    <span class="fw-500">{{ $job->short_describe }}</span>
                                                </div>
                                                <span class="fs-14">
                                                    <a href="{{ route('freelancer.companyProfile', $job->user_id) }}">
                                                        {{ $job->company_name }}
                                                    </a>
                                                    -
                                                    <span class="text-fade">{{ $job->location }}
                                                        <em><small>{{ $job->created_at->diffForHumans() }}</small></em>
                                                    </span>
                                            </div>
                                        </div>
                                        <div class="d-lg-flex align-items-center justify-content-between">
                                            <div class="d-lg-flex d-block align-items-center">
                                                @foreach ($job->applicants as $applicant)
                                                    @if ($applicant->rating)
                                                        <p>Rating: ⭐{{ $applicant->rating->score }}</p>
                                                        <p style="margin-left: 15px">Comment:
                                                            {{ $applicant->rating->comment }}</p>
                                                    @else
                                                        <p>Your job has not been rated yet, please check back later.</p>
                                                    @endif
                                                @endforeach
                                            </div>
                                            <div class="ms-lg-10">
                                                <a href="{{ route('freelancer.jobDetail', ['job_id' => $job->job_id]) }}"
                                                    class="btn btn-sm mt-lg-0 mt-2"
                                                    style="background-color: #e4f3ff; color: #2196f3; margin-left: 10px">More
                                                    Info</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="position-relative w-xl-300 w-lg-250 ps-lg-20 bs-1 ms-lg-20">
                                        <h4 class="mt-lg-0 mt-25 mb-25">
                                            <small class="text-fade fs-12">Openings Postition</small><br>
                                            {{ $job->job_title }}
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
                <div class="d-flex justify-content-center">
                    <div class="custom-pagination">
                        {{ $completedJobs->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
