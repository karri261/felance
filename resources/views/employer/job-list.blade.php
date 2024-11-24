@foreach ($jobs as $job)
    <div class="box">
        <div class="box-body" style="position: relative;">
            <div class="d-lg-flex justify-content-between">
                <div class="w-100">
                    <div class="d-flex align-items-center" style="margin-bottom: 30px">
                        <div class="me-15">
                            <img src="{{ asset($job->company_logo) }}" class="avatar avatar-lg me-3">
                        </div>
                        <div class="d-flex flex-column">
                            <div class="text-dark mb-1" style="text-decoration: none; font-size: 20px">
                                <span class="fw-500">{{ $job->short_describe }}</span>
                                <span
                                    style="background-color: #eee; color: #1e1e1e; font-size: 75%; padding: 2px 5px; border-radius: 5px; margin-left: 10px">{{ $job->status }}
                                </span>
                            </div>
                            <span class="fs-14">
                                {{ $job->company_name }} -
                                <span class="text-fade">{{ $job->location }}
                                    <em><small>{{ $job->created_at->diffForHumans() }}</small></em>
                                </span>
                            </span>
                            <div class="d-flex">
                                <button id="mark-as-done-btn-{{ $job->job_id }}"
                                    class="mark-as-done-btn {{ $job->finish ? 'btn-done' : 'btn-mark-as-done' }}">
                                    {{ $job->finish ? 'Done' : 'Mark as done' }}
                                </button>
                                <a href="{{ route('employer.rating', ['job_id' => $job->job_id]) }}"
                                    class="btn-rating rating-btn-{{ $job->job_id }}"
                                    style="display: {{ $job->finish ? 'inline-block' : 'none' }};">
                                    Rate the freelancer
                                </a>
                            </div>
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
                            <a href="{{ route('employer.jobDetail', ['job_id' => $job->job_id]) }}"
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
                    <div class="d-flex" style="justify-content: space-around">
                        <a href="{{ route('employer.editJob', ['job_id' => $job->job_id]) }}"
                            class="btn w-40 btn-success">
                            <i class="fa-regular fa-pen-to-square"></i>
                        </a>
                        <div class="w-40">
                            <form action="{{ route('employer.deleteJob', $job->job_id) }}" method="POST">
                                @csrf
                                <input type="hidden" name="job_id" value="{{ $job->job_id }}">
                                <button id="apply-btn" type="submit" class="btn w-100 btn-danger">
                                    <i class="fa-regular fa-trash-can"></i>
                                </button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        @if ($job->pendingApplications > 0)
            <span class="notify" style="top: 10px">
                {{ $job->pendingApplications }}
            </span>
        @endif
    </div>
    <script>
        $(document).ready(function() {
            $('.mark-as-done-btn').click(function() {
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
                    },
                    error: function(xhr, status, error) {
                        alert('An error occurred. Please try again.');
                    }
                });
            });
        });
    </script>
@endforeach
<div class="d-flex justify-content-center">
    <div class="custom-pagination">
        {{ $jobs->links('pagination::bootstrap-5') }}
    </div>
</div>
