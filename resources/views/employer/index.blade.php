@extends('employer.master')
@section('title', 'Employer| Main Dashboard')

@section('main-content')
@section('main-content')
    <div class="container">
        @if ($missingInfo)
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Warning!</strong> Please update your company information before posting a job.
            </div>
        @endif
        <div class="row">
            <div class="col-lg-9 col-md-8 col-12">
                <div class="tab-content" id="job-list">
                    @include('employer.job-list', ['jobs' => $jobs])
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-12">
                <div class="side-block px-20 py-10 bg-white">
                    <div class="widget courses-search-bx placeholdertx" style="margin-bottom: 15px">
                        <div class="form-group">
                            <div class="input-group">
                                <input name="job_name" type="text" class="form-control" placeholder=" " required>
                                <label>Search Jobs</label>
                            </div>
                        </div>
                    </div>
                    <div class="widget">
                        <h5 class="pb-15 mb-25 bb-1">Approval Status</h5>
                        <ul class="list-unstyled">
                            <li>
                                <input type="radio" id="levels_1" class="filled-in" name="status" value="wait"
                                    {{ request('status') == 'wait' ? 'checked' : '' }}>
                                <label for="levels_1" class="d-flex justify-content-between align-items-center form-label">
                                    Waiting for approval
                                </label>
                            </li>
                            <li>
                                <input type="radio" id="levels_2" class="filled-in" name="status" value="approve"
                                    {{ request('status') == 'approve' ? 'checked' : '' }}>
                                <label for="levels_2" class="d-flex justify-content-between align-items-center form-label">
                                    Approved
                                </label>
                            </li>
                            <li>
                                <input type="radio" id="levels_3" class="filled-in" name="status" value="reject"
                                    {{ request('status') == 'reject' ? 'checked' : '' }}>
                                <label for="levels_3" class="d-flex justify-content-between align-items-center form-label">
                                    Rejected
                                </label>
                            </li>
                            <li>
                                <input type="radio" id="levels_4" class="filled-in" name="status" value="all"
                                    {{ !request('status') || request('status') == 'all' ? 'checked' : '' }}>
                                <label for="levels_4" class="d-flex justify-content-between align-items-center form-label">
                                    All
                                </label>
                            </li>
                        </ul>

                        <h5 class="pb-15 mb-25 bb-1">Completion Status</h5>
                        <ul class="list-unstyled">
                            <li>
                                <input type="radio" id="levels_5" class="filled-in" name="finish" value="complete"
                                    {{ request('finish') == 'complete' ? 'checked' : '' }}>
                                <label for="levels_5" class="d-flex justify-content-between align-items-center form-label">
                                    Completed
                                </label>
                            </li>
                            <li>
                                <input type="radio" id="levels_6" class="filled-in" name="finish" value="unfinish"
                                    {{ request('finish') == 'unfinish' ? 'checked' : '' }}>
                                <label for="levels_6" class="d-flex justify-content-between align-items-center form-label">
                                    Unfinished
                                </label>
                            </li>
                            <li>
                                <input type="radio" id="levels_7" class="filled-in" name="finish" value="all"
                                    {{ !request('finish') || request('finish') == 'all' ? 'checked' : '' }}>
                                <label for="levels_7" class="d-flex justify-content-between align-items-center form-label">
                                    All
                                </label>
                            </li>
                        </ul>

                        <h5 class="pb-15 mb-25 bb-1">Recruitment Status</h5>
                        <ul class="list-unstyled">
                            <li>
                                <input type="radio" id="levels_8" class="filled-in" name="recruit" value="open"
                                    {{ request('recruit') == 'open' ? 'checked' : '' }}>
                                <label for="levels_8" class="d-flex justify-content-between align-items-center form-label">
                                    Open
                                </label>
                            </li>
                            <li>
                                <input type="radio" id="levels_9" class="filled-in" name="recruit" value="close"
                                    {{ request('recruit') == 'close' ? 'checked' : '' }}>
                                <label for="levels_9" class="d-flex justify-content-between align-items-center form-label">
                                    Closed
                                </label>
                            </li>
                            <li>
                                <input type="radio" id="levels_10" class="filled-in" name="recruit" value="all"
                                    {{ !request('recruit') || request('recruit') == 'all' ? 'checked' : '' }}>
                                <label for="levels_10" class="d-flex justify-content-between align-items-center form-label">
                                    All
                                </label>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            function fetchJobs() {
                const jobName = $('input[name="job_name"]').val();
                const status = $('input[name="status"]:checked').val();
                const finish = $('input[name="finish"]:checked').val();
                const recruit = $('input[name="recruit"]:checked').val();

                // Send AJAX request
                $.ajax({
                    url: '{{ route('employer.filterJobs') }}',
                    method: 'GET',
                    data: {
                        job_name: jobName,
                        status: status,
                        finish: finish,
                        recruit: recruit
                    },
                    success: function(response) {
                        $('#job-list').html(response);
                    }
                });
            }

            $('input[name="job_name"]').on('keyup', fetchJobs);
            $('input[name="status"]').on('change', fetchJobs);
            $('input[name="finish"]').on('change', fetchJobs);
            $('input[name="recruit"]').on('change', fetchJobs);
        });

        $(document).ready(function() {
            $(document).on('click', '.mark-as-done-btn', function() {
                var button = $(this);
                var job_id = button.attr('id').split('-').pop();
                var isDone = button.hasClass('btn-done');

                $.ajax({
                    url: '/employer/mark-as-done/' + job_id,
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        is_done: isDone ? 0 : 1
                    },
                    success: function(response) {
                        if (isDone) {
                            button.text('Mark as done');
                            button.removeClass('btn-done').addClass('btn-mark-as-done');
                            $('.rating-btn-' + job_id).hide();
                        } else {
                            button.text('Done');
                            button.removeClass('btn-mark-as-done').addClass('btn-done');
                            $('.rating-btn-' + job_id).show();
                        }
                        fetchJobs();
                    },
                    error: function(xhr, status, error) {
                        alert('An error occurred. Please try again.');
                    }
                });
            });

        });
    </script>
@endsection
@endsection
