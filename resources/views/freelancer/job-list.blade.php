@foreach ($jobs as $job)
    <div class="box">
        <div class="box-body">
            <div class="d-lg-flex justify-content-between">
                <div class="w-100">
                    <div class="d-flex align-items-center" style="margin-bottom: 30px">
                        <div class="me-15">
                            <img src="{{ asset($job->company_logo) }}" class="avatar avatar-lg me-3">
                        </div>
                        <div class="d-flex flex-column">
                            <div href="#" class="text-dark mb-1" style="text-decoration: none; font-size: 20px">
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
                            <h6 class="d-inline-block mb-0 rounded fs-14 mt-2"
                                style=" background-color: #e9edf2; 
                            padding: 5px 10px;
                            color: #172b4c">
                                <span>Salary:</span> ${{ $job->salary_min }} - ${{ $job->salary_max }}
                            </h6>
                            <h6 class="d-inline-block mb-0 rounded mx-10 my-0 fs-14 mt-2"
                                style=" background-color: #e9edf2; 
                                padding: 5px 10px;
                                color: #172b4c">
                                <span>Openings Position:</span> {{ $job->openings_position }}
                            </h6>
                            <h6 class="d-inline-block mb-0 rounded fs-14 mt-2"
                                style=" background-color: #e9edf2; 
                                padding: 5px 10px;
                                color: #172b4c">
                                <span>Experience:</span> {{ $job->experience_required }}+ year
                            </h6>
                        </div>
                        <div class="ms-lg-10">
                            <a href="{{ route('freelancer.jobDetail', ['job_id' => $job->job_id]) }}"
                                class="btn btn-sm mt-lg-0 mt-2"
                                style="background-color: #e4f3ff; color: #2196f3; margin-left: 10px">More Info</a>
                        </div>
                    </div>
                </div>
                <div class="position-relative w-xl-300 w-lg-250 ps-lg-20 bs-1 ms-lg-20">
                    <h4 class="mt-lg-0 mt-25 mb-25">
                        <small class="text-fade fs-12">Openings Postition</small><br>
                        {{ $job->job_title }}
                    </h4>
                    <form action="{{ route('freelancer.applyJob') }}" method="POST">
                        @csrf
                        <input type="hidden" name="job_id" value="{{ $job->job_id }}">
                        @php
                            $hasApplied = \App\Models\Applicant::where('user_id', Auth::id())
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
@endforeach
<div class="d-flex justify-content-center">
    <div class="custom-pagination">
        {{ $jobs->links('pagination::bootstrap-5') }}
    </div>
</div>
