@extends('freelancer.master')
@section('title', 'Freelancer| Main Dashboard')

@section('main-content')
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-8 col-12">
                <div class="tab-content" id="job-list">
                    @include('freelancer.job-list', ['jobs' => $jobs])
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
                        <h4 style="margin-bottom: 25px">Location</h4>
                        <div class="widget placeholdertx" style="margin-bottom: 20px">
                            <div class="form-group">
                                <div class="input-group">
                                    <input name="location" type="text" required="" class="form-control"
                                        placeholder="Type Location">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="widget">
                        <h4 style="margin-bottom: 25px">Category</h4>
                        <ul class="list-unstyled">
                            <li>
                                <input type="checkbox" id="basic_checkbox_6" class="filled-in" name="categories[]"
                                    value="Accounting / Finance">
                                <label for="basic_checkbox_6"
                                    class="d-flex justify-content-between align-items-center form-label">
                                    Accounting / Finance
                                </label>
                            </li>
                            <li>
                                <input type="checkbox" id="basic_checkbox_7" class="filled-in" name="categories[]"
                                    value="Construction / Facilities">
                                <label for="basic_checkbox_7"
                                    class="d-flex justify-content-between align-items-center form-label">
                                    Construction / Facilities
                                </label>
                            </li>
                            <li>
                                <input type="checkbox" id="basic_checkbox_8" class="filled-in" name="categories[]"
                                    value="Design & Multimedia">
                                <label for="basic_checkbox_8"
                                    class="d-flex justify-content-between align-items-center form-label">
                                    Design & Multimedia
                                </label>
                            </li>
                            <li>
                                <input type="checkbox" id="basic_checkbox_1" class="filled-in" name="categories[]"
                                    value="Education Training">
                                <label for="basic_checkbox_1"
                                    class="d-flex justify-content-between align-items-center form-label">
                                    Education Training
                                </label>
                            </li>
                            <li>
                                <input type="checkbox" id="basic_checkbox_2" class="filled-in" name="categories[]"
                                    value="Health">
                                <label for="basic_checkbox_2"
                                    class="d-flex justify-content-between align-items-center form-label">
                                    Health
                                </label>
                            </li>
                            <li>
                                <input type="checkbox" id="basic_checkbox_3" class="filled-in" name="categories[]"
                                    value="Restaurant / Food Service">
                                <label for="basic_checkbox_3"
                                    class="d-flex justify-content-between align-items-center form-label">
                                    Restaurant / Food Service
                                </label>
                            </li>
                            <li>
                                <input type="checkbox" id="basic_checkbox_4" class="filled-in" name="categories[]"
                                    value="Telecommunications">
                                <label for="basic_checkbox_4"
                                    class="d-flex justify-content-between align-items-center form-label">
                                    Telecommunications
                                </label>
                            </li>
                        </ul>
                    </div>
                    <div class="widget">
                        <h4 class="pb-15 mb-25 bb-1">Salary</h4>
                        <ul class="list-unstyled">
                            <li>
                                <input type="radio" id="levels_1" class="filled-in" name="salary" value="lt_100">
                                <label for="levels_1" class="d-flex justify-content-between align-items-center form-label">
                                    Less than $100
                                </label>
                            </li>
                            <li>
                                <input type="radio" id="levels_2" class="filled-in" name="salary" value="lt_500">
                                <label for="levels_2" class="d-flex justify-content-between align-items-center form-label">
                                    Less than $500
                                </label>
                            </li>
                            <li>
                                <input type="radio" id="levels_3" class="filled-in" name="salary" value="lt_1000">
                                <label for="levels_3"
                                    class="d-flex justify-content-between align-items-center form-label">
                                    Less than $1000
                                </label>
                            </li>
                            <li>
                                <input type="radio" id="levels_4" class="filled-in" name="salary"
                                    value="gt_1000">
                                <label for="levels_4"
                                    class="d-flex justify-content-between align-items-center form-label">
                                    Greater than $1000
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
                const location = $('input[name="location"]').val();
                const categories = $('input[name="categories[]"]:checked').map(function() {
                    return $(this).val();
                }).get();
                const salaryRange = $('input[name="salary"]:checked').val();

                console.log('Categories:', categories);
                console.log('Salary Range:', salaryRange);

                // Send AJAX request
                $.ajax({
                    url: '{{ route('filterJobs') }}',
                    method: 'GET',
                    data: {
                        job_name: jobName,
                        location: location,
                        categories: categories,
                        salary: salaryRange
                    },
                    success: function(response) {
                        $('#job-list').html(response);
                    }
                });
            }

            $('input[name="job_name"]').on('keyup', fetchJobs);
            $('input[name="location"]').on('keyup', fetchJobs);
            $('input[name="categories[]"]').on('change', fetchJobs);
            $('input[name="salary"]').on('change', fetchJobs);
        });
    </script>

@endsection
