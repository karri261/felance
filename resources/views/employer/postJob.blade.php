@extends('employer.master')
@section('title', 'Employer| Main Dashboard')

@section('main-content')
    <div class="container">
        <div class="box" style="background: #fff; padding: 30px; border-radius: 15px">
            <div class="row">
                <div class="col-12">
                    <form class="form" action="{{ route('employer.postJobPOST') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf

                        <h4 class="box-title text-primary fs-18" style="color: #2196f3">
                            <i class="fa-solid fa-bars-progress"></i>
                            Basic information
                        </h4>
                        <hr class="my-15">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label">Job title</label>
                                    <input type="text" class="form-control" placeholder="Job title" name="job_title">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label">Category</label>
                                    <select class="form-control" name="category">
                                        <option value="Accounting / Finance">Accounting / Finance</option>
                                        <option value="Design & Multimedia">Design & Multimedia</option>
                                        <option value="Education Training">Education Training</option>
                                        <option value="Health">Health</option>
                                        <option value="Restaurant / Food Service">Restaurant / Food Service</option>
                                        <option value="Telecommunications">Telecommunications</option>
                                        <option value="Others">Others</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label">Gender</label>
                                    <select class="form-control" name="gender">
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                        <option value="any">Any</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label">Salary min</label>
                                    <input type="number" min="0" class="form-control" placeholder="Salary min"
                                        name="salary_min">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label">Salary max</label>
                                    <input type="number" min="0" class="form-control" placeholder="Salary max"
                                        name="salary_max">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label">Opening </label>
                                    <input type="number" min="0" class="form-control" placeholder="Opening"
                                        name="opening">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label">Experience required</label>
                                    <input type="number" min="0" class="form-control"
                                        placeholder="Experience required" name="experience">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label">Qualification</label>
                                    <select class="form-control" name="qualification">
                                        <option value="Certificate">Certificate</option>
                                        <option value="Associate Degree">Associate Degree</option>
                                        <option value="Bachelor Degree">Bachelor Degree</option>
                                        <option value="Master Degree">Master Degree</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label">Career level</label>
                                    <select class="form-control" name="career_level">
                                        <option value="manager">Manager</option>
                                        <option value="student">Student</option>
                                        <option value="junior">Junior</option>
                                        <option value="senior">Senior</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label">End date</label>
                                    <input type="date" class="form-control" name="end_date">
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label class="form-label">Short describe</label>
                                    <input type="text" class="form-control" name="short_describe">
                                </div>
                            </div>
                        </div>
                        <h4 class="box-title text-primary mt-30 fs-18">
                            <i class="fa-regular fa-address-book"></i>
                            Job description
                        </h4>
                        <hr class="my-15">
                        <div class="form-group">
                            <textarea rows="7" class="form-control" id="job_description" name="job_description"></textarea>
                            <script>
                                CKEDITOR.replace('job_description');
                            </script>
                        </div>
                        <h4 class="box-title text-primary mt-30 fs-18">
                            <i class="fa-regular fa-address-book"></i>
                            Responsibility
                        </h4>
                        <hr class="my-15">
                        <div class="form-group">
                            <textarea rows="7" class="form-control" id="responsibilities" name="responsibilities"></textarea>
                            <script>
                                CKEDITOR.replace('responsibilities');
                            </script>
                        </div>
                        <h4 class="box-title text-primary mt-30 fs-18">
                            <i class="fa-regular fa-address-book"></i>
                            Background, Skills & Experience
                        </h4>
                        <hr class="my-15">
                        <div class="form-group">
                            <textarea rows="7" class="form-control" id="background" name="background"></textarea>
                            <script>
                                CKEDITOR.replace('background');
                            </script>
                        </div>
                        <div class="d-flex justify-content-end" style="margin-top: 20px">
                            <button type="submit" class="btn btn-success" style="margin: 0 5px">
                                <i class="fa-regular fa-floppy-disk"></i> Save changes
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
