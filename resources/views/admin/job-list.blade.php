@if (isset($jobs) && count($jobs) > 0)
                        @foreach ($jobs as $job)
                            <a href="{{ route('jobDetail', $job->job_id) }}" style="text-decoration: none; color:black">
                                <div class="box wow fadeInUp" id="box-manage-job">
                                    <div class="box-body">
                                        <div class=left-box">
                                            <div class="left-top"> 
                                                <div class="left-top-logo"> {{-- me-15 --}}
                                                    <img src="{{ asset($job->company_logo) }}"
                                                        class="">
                                                </div>
                                                <div class="left-top-title"> 
                                                    <div>
                                                        <span class="company-name">{{ $job->company_name }}</span>
                                                        <span class="freelancer-tag">{{ $job->status }}</span>
                                                    </div>
                                                    <span class="place-time" style="text-align: left;">
                                                        <i class="place-time-icon fa-solid fa-location-dot"></i>
                                                        <span class="place-time-content">{{ $job->location }}
                                                            <em><small>{{ $job->created_at->diffForHumans() }}</small></em>
                                                        </span>
                                                </div>
                                            </div>
                                            <div class="left-buttom "> 
                                                <div class="left-buttom-tag">
                                                    <span> 
                                                        <span class="tag-title">Salary:</span> ${{ $job->salary_min }} -
                                                        ${{ $job->salary_max }}
                                                    </span>
                                                    <span class="tag-exp">
                                                        <span class="tag-title">Experience:</span>
                                                        {{ $job->experience_required }} year
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="right-box" id="manage-job-right-box">
                                            <span class="job-title">
                                                <small class="text-fade fs-12">Openings Position</small><br>
                                                <span class="job-title-name">{{ $job->job_title }}</span>
                                            </span>
                                            <div class="check">
                                                <i class="fa-solid fa-trash no" id="manage-job-no"></i>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </a>
                        @endforeach
                        {{-- <div class="custom-pagination">
                            {{ $jobs->links('pagination::bootstrap-5') }}
                        </div> --}}
                    @else
                        <p>Không có công việc nào. </p>
                    @endif