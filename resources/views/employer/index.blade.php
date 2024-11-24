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
                    <div class="widget courses-search-bx placeholdertx" style="margin-bottom: 30px">
                        <div class="form-group">
                            <div class="input-group">
                                <input name="job_name" type="text" class="form-control" placeholder=" " required>
                                <label>Search Jobs</label>
                            </div>
                        </div>
                    </div>
                    <div class="widget">
                        <h4 class="pb-15 mb-25 bb-1">Status</h4>
                        <ul class="list-unstyled">
                            <li>
                                <input type="radio" id="levels_1" class="filled-in" name="status" value="wait">
                                <label for="levels_1" class="d-flex justify-content-between align-items-center form-label">
                                    Waiting for approval
                                </label>
                            </li>
                            <li>
                                <input type="radio" id="levels_2" class="filled-in" name="status" value="approve">
                                <label for="levels_2" class="d-flex justify-content-between align-items-center form-label">
                                    Approved
                                </label>
                            </li>
                            <li>
                                <input type="radio" id="levels_3" class="filled-in" name="status" value="reject">
                                <label for="levels_3" class="d-flex justify-content-between align-items-center form-label">
                                    Rejected
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

                // Send AJAX request
                $.ajax({
                    url: '{{ route('employer.filterJobs') }}',
                    method: 'GET',
                    data: {
                        job_name: jobName,
                        status: status
                    },
                    success: function(response) {
                        $('#job-list').html(response);
                    }
                });
            }

            $('input[name="job_name"]').on('keyup', fetchJobs);
            $('input[name="status"]').on('change', fetchJobs);
        });
    </script>

@endsection
@endsection
