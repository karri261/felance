@extends('admin.master')

@section('main-content')
    <div class="" style="text-align:center; padding-top:10px; padding-left:57px;">
        @if (isset($jobs) && count($jobs) > 0)
            @foreach ($jobs as $job)
                <a href="{{ route('approve.jobDetail', $job->job_id) }}" style="text-decoration: none; color:black">
                    <div class="box wow fadeInUp">
                        <div class="box-body" id="approve-box-body">
                            <div class="left-box" id="approve-left-box">
                                <div class="left-top">
                                    <div class="left-top-logo">
                                        <img src="{{ asset($job->company_logo) }}" class="">
                                    </div>
                                    <div class="left-top-title">
                                        <div>
                                            <span class="company-name">{{ $job->short_describe }}</span>
                                        </div>
                                        <span class="place-time" style="text-align: left;">
                                            <span class="place-time-content"
                                                style="color:rgb(84, 138, 226);">{{ $job->company_name }}</span>
                                            <span class="place-time-content"> - {{ $job->location }}
                                                <em><small> {{ $job->created_at->diffForHumans() }}</small></em>
                                            </span>
                                    </div>
                                </div>
                                <div class="left-buttom ">
                                    <div class="left-buttom-tag">
                                        <span>
                                            <span class="tag-title">Salary:</span> ${{ $job->salary_min }} -
                                            ${{ $job->salary_max }}
                                        </span>
                                        <span class="tag-open">
                                            <span class="tag-title">Openings Position:</span> {{ $job->openings_position }}
                                        </span>
                                        <span class="tag-exp">
                                            <span class="tag-title">Experience:</span> {{ $job->experience_required }} year
                                        </span>
                                    </div>
                                    <div class="left-buttom-more">
                                        <a href="{{ route('jobDetail', ['job_id' => $job->job_id]) }}"
                                            class="btn btn-sm mt-lg-0 mt-2 more-info-btn">
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="right-box" id="approve-right-box">
                                <span class="job-title">
                                    <small class="text-fade fs-12">Openings Position</small><br>
                                    <span class="job-title-name">{{ $job->job_title }}</span>
                                </span>
                                <div class="check" id="approve-check">
                                    <i class="fa-solid fa-check ok" id="check-ok" data-id="{{ $job->job_id }}"></i>
                                    <i class="fa-solid fa-xmark no" id="check-no" data-id="{{ $job->job_id }}"></i>
                                </div>
                            </div>

                        </div>
                    </div>
                </a>
            @endforeach
            <div class="custom-pagination">
                {{ $jobs->links('pagination::bootstrap-5') }}
            </div>
        @else
            <p>No job post is needed to approval </p>
        @endif

    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            console.log("hihi")
            document.addEventListener('click', function(event) {
                const approveButton = event.target.closest('#check-ok');
                if (approveButton) {
                    const id = approveButton.getAttribute('data-id');
                    if (confirm('Are you sure to approve this Job post?')) {

                        fetch(`/admin/approve-job-post/approve-ok/${id}`, {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                                        .getAttribute('content'),
                                }

                            })
                            .then(response => response.json())
                            .then(data => {
                                if (data.success) {
                                    location.reload();
                                    alert('Approve successfully. Sent email to Employer!');

                                } else {
                                    alert('Có lỗi: ' + data.message);
                                }
                            })
                            .catch(error => {
                                console.error('Error:', error);
                                alert('Có lỗi xảy ra!', error);
                            });
                    }
                }
                //Reject job post
                const rejectButton = event.target.closest('#check-no');
                if (rejectButton) {
                    const id = rejectButton.getAttribute('data-id');
                    if (confirm('Are you sure to reject this Job post?')) {
                        reason = prompt('Please enter the reason for rejecting this job:');
                        if (!reason) {
                            alert('Reject reason is required.');
                            return;
                        }

                        fetch(`/admin/approve-job-post/approve-no/${id}`, {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-Requested-With': 'XMLHttpRequest',
                                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                                },
                                body: JSON.stringify({
                                    reason: reason
                                }),
                            })
                            .then(response => response.json())
                            .then(data => {
                                if (data.success) {
                                    alert('Reject successfully. Sent email to Employer!');
                                    location.reload();
                                } else {
                                    alert('Có lỗi: '.data.message);
                                }
                            })
                            .catch(error => {
                                console.error('Error:', error);
                                alert('Có lỗi xảy ra!', error.message);
                            });
                    }
                }
            });
        });
    </script>
@endsection
