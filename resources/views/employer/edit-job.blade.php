@extends('employer.master')
@section('title', 'Employer| Main Dashboard')

@section('main-content')
    <div class="container">
        <div class="box" style="background: #fff; padding: 30px; border-radius: 15px">
            <div class="row">
                <div class="col-12">
                    <form class="form" action="{{ route('employer.editJobPost' , $job->job_id) }}" method="POST">
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
                                    <input type="text" class="form-control" placeholder="Job title" name="job_title"
                                        value="{{ $job->job_title }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label">Category</label>
                                    <select class="form-control" name="category">
                                        <option value="Accounting / Finance"
                                            {{$job->categories == 'Accounting / Finance' ? 'selected' : '' }}>
                                            Accounting / Finance</option>
                                        <option value="Design & Multimedia"
                                            {{$job->categories == 'Design & Multimedia' ? 'selected' : '' }}>
                                            Design & Multimedia</option>
                                        <option value="Education Training"
                                            {{$job->categories == 'Education Training' ? 'selected' : '' }}>
                                            Education Training</option>
                                        <option value="Health"
                                            {{$job->categories == 'Health' ? 'selected' : '' }}>Health
                                        </option>
                                        <option value="Restaurant / Food Service"
                                            {{$job->categories == 'Restaurant / Food Service' ? 'selected' : '' }}>
                                            Restaurant / Food Service</option>
                                        <option value="Telecommunications"
                                            {{$job->categories == 'Telecommunications' ? 'selected' : '' }}>
                                            Telecommunications</option>
                                        <option value="Others"
                                            {{$job->categories == 'Others' ? 'selected' : '' }}>Others
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label">Gender</label>
                                    <select class="form-control" name="gender">
                                        <option value="male" {{$job->gender == 'Male' ? 'selected' : '' }}>Male</option>
                                        <option value="female" {{$job->gender == 'Female' ? 'selected' : '' }}>Female</option>
                                        <option value="any" {{$job->gender == 'Any' ? 'selected' : '' }}>Any</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label">Salary min</label>
                                    <input type="number" min="0" class="form-control" placeholder="Salary min"
                                        name="salary_min" value="{{ $job->salary_min }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label">Salary max</label>
                                    <input type="number" min="0" class="form-control" placeholder="Salary max"
                                        name="salary_max" value="{{ $job->salary_max }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label">Opening </label>
                                    <input type="number" min="0" class="form-control" placeholder="Opening"
                                        name="opening" value="{{ $job->openings_position }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label">Experience required</label>
                                    <input type="number" min="0" class="form-control"
                                        placeholder="Experience required" name="experience" value="{{ $job->experience_required }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label">Qualification</label>
                                    <select class="form-control" name="qualification">
                                        <option value="Certificate" {{$job->qualification == 'Certificate' ? 'selected' : '' }}>Certificate</option>
                                        <option value="Associate Degree" {{$job->qualification == 'Associate Degree' ? 'selected' : '' }}>Associate Degree</option>
                                        <option value="Bachelor Degree" {{$job->qualification == 'Bachelor Degree' ? 'selected' : '' }}>Bachelor Degree</option>
                                        <option value="Master Degree" {{$job->qualification == 'Master Degree' ? 'selected' : '' }}>Master Degree</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label">Career level</label>
                                    <select class="form-control" name="career_level">
                                        <option value="manager" {{$job->career_level == 'Manager' ? 'selected' : '' }}>Manager</option>
                                        <option value="student" {{$job->career_level == 'Student' ? 'selected' : '' }}>Student</option>
                                        <option value="junior" {{$job->career_level == 'Junior' ? 'selected' : '' }}>Junior</option>
                                        <option value="senior" {{$job->career_level == 'Senior' ? 'selected' : '' }}>Senior</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label">End date</label>
                                    <input type="date" class="form-control" name="end_date" value="{{ $job->end_date }}">
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label class="form-label">Short describe</label>
                                    <input type="text" class="form-control" name="short_describe" value="{{ $job->short_describe }}">
                                </div>
                            </div>
                        </div>
                        <h4 class="box-title text-primary mt-30 fs-18">
                            <i class="fa-regular fa-address-book"></i>
                            Job description
                        </h4>
                        <hr class="my-15">
                        <div class="form-group">
                            <textarea rows="7" class="form-control" id="job_description" name="job_description" >{{ $job->job_description }}</textarea>
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
                            <textarea rows="7" class="form-control" id="responsibilities" name="responsibilities">{{ $job->responsibilities }}</textarea>
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
                            <textarea rows="7" class="form-control" id="background" name="background">{{ $job->background }}</textarea>
                            <script>
                                CKEDITOR.replace('background');
                            </script>
                        </div>
                        <div class="d-flex justify-content-end" style="margin-top: 20px">
                            <a href=" {{ route('employer') }}" class="btn btn-warning" style="margin: 0 5px; color: #fff">
                                <i class="fa-solid fa-ban"></i> Cancel
                            </a>
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
