@extends('employer.master')
@section('title', 'Employer| Main Dashboard')

@section('main-content')
    <div class="container applicant">
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert" id="alert-error">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session('status'))
            <div class="alert alert-success alert-dismissible fade show" role="alert" id="alert-success">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                {{ session('status') }}
            </div>
        @endif

        <div class="title">
            <a href="{{ route('employer.jobDetail', ['job_id' => $job->job_id]) }}"
                style="text-decoration: none; color: #1e1e1e">
                <i class="fa-solid fa-angle-left"></i>
            </a>
            Rating for freelancers of {{ $job->job_title }} job.
        </div>
        <div class="row d-flex">
            @foreach ($applicants as $applicant)
                <div class="freelancer-card col-md-3" style="position: relative">
                    <button class="btn-report" data-bs-toggle="modal" data-bs-target="#reportModal{{ $applicant->id }}">
                        <i class="fa-regular fa-flag"></i>
                    </button>

                    <div class="modal fade" id="reportModal{{ $applicant->id }}" tabindex="-1"
                        aria-labelledby="reportModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form action="{{ route('employer.report') }}" method="POST">
                                    @csrf
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="reportModalLabel">Report
                                            {{ $applicant->user->firstname }} {{ $applicant->user->lastname }}</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <input type="hidden" name="reported_user_id" value="{{ $applicant->user_id }}">
                                        <div class="mb-3">
                                            <select class="form-select" id="title" name="title"
                                                onchange="toggleOtherReason(this)" required>
                                                <option value="" disabled selected>-- Select a reason --</option>
                                                <option value="Inappropriate language">Inappropriate language</option>
                                                <option value="Spam">Spam</option>
                                                <option value="Fraudulent behavior">Fraudulent behavior</option>
                                                <option value="Harassment">Harassment</option>
                                                <option value="Other">Other</option>
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label for="detail" class="form-label" style="float: left">Reason for
                                                Reporting</label>
                                            <textarea class="form-control" id="reason" name="detail" rows="4" required></textarea>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn btn-danger">Submit Report</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <a
                        href="{{ route('employer.applicantProfileRate', ['user_id' => $applicant->user_id, 'job_id' => $applicant->job_id]) }}">
                        <img src="{{ asset($applicant->freelancer->avatar) }}" class="freelancer-avatar">
                        <p class="freelancer-name">
                            <span>{{ $applicant->user->firstname }} {{ $applicant->user->lastname }}</span>
                        </p>
                        <p class="freelancer-work" style="color: #1e1e1e">{{ $applicant->user->email }}</p>
                    </a>
                    <div class="freelancer-info">
                        <span>
                            <svg class="freelancer-icon" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M12.5599 20.8207C12.2247 21.0598 11.7753 21.0598 11.4401 20.8207C6.61138 17.3773 1.48557 10.2971 6.6667 5.18128C8.08118 3.78463 9.99963 3 12 3C14.0004 3 15.9188 3.78463 17.3333 5.18128C22.5144 10.2971 17.3886 17.3773 12.5599 20.8207Z"
                                    stroke="#111111" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                </path>
                                <path
                                    d="M12 12C13.1046 12 14 11.1046 14 10C14 8.89543 13.1046 8 12 8C10.8954 8 10 8.89543 10 10C10 11.1046 10.8954 12 12 12Z"
                                    stroke="#111111" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                </path>
                            </svg>
                            {{ $applicant->freelancer->address }}
                        </span>
                        <span>
                            <svg class="freelancer-icon" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M12 21C16.9706 21 21 16.9706 21 12C21 7.02944 16.9706 3 12 3M12 21C7.02944 21 3 16.9706 3 12C3 7.02944 7.02944 3 12 3M12 21C14.7614 21 15.9413 15.837 15.9413 12C15.9413 8.16303 14.7614 3 12 3M12 21C9.23858 21 8.05895 15.8369 8.05895 12C8.05895 8.16307 9.23858 3 12 3M3.49988 8.99998C10.1388 8.99998 13.861 8.99998 20.4999 8.99998M3.49988 15C10.1388 15 13.861 15 20.4999 15"
                                    stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                </path>
                            </svg>
                            {{ $applicant->freelancer->languages }}
                        </span>
                    </div>
                    <div class="freelancer-rating">
                        <span>⭐ {{ $applicant->freelancer->rating }} ({{ $applicant->total_jobs }})</span>
                        <div>
                            @if ($applicant->rating)
                                <button type="button" class="btn btn-secondary" disabled>
                                    Already Rated
                                </button>
                            @else
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#modal-{{ $applicant->id }}">
                                    Rate
                                </button>
                            @endif
                                <!-- Modal -->
                                <div class="modal fade" id="modal-{{ $applicant->id }}" tabindex="-1"
                                    aria-labelledby="modalLabel-{{ $applicant->id }}" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form action="{{ route('employer.rate') }}" method="POST">
                                                @csrf
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="modalLabel-{{ $applicant->id }}">
                                                        Rate for {{ $applicant->user->firstname }}
                                                        {{ $applicant->user->lastname }}
                                                        in {{ $job->job_title }} position.
                                                    </h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <input type="hidden" name="applicant_id"
                                                        value="{{ $applicant->id }}">
                                                    <div class="rate-box">
                                                        <div class="rate">
                                                            <input type="radio" id="star5-{{ $applicant->id }}"
                                                                name="rate" value="5" />
                                                            <label for="star5-{{ $applicant->id }}" title="text">5
                                                                stars</label>
                                                            <input type="radio" id="star4-{{ $applicant->id }}"
                                                                name="rate" value="4" />
                                                            <label for="star4-{{ $applicant->id }}" title="text">4
                                                                stars</label>
                                                            <input type="radio" id="star3-{{ $applicant->id }}"
                                                                name="rate" value="3" />
                                                            <label for="star3-{{ $applicant->id }}" title="text">3
                                                                stars</label>
                                                            <input type="radio" id="star2-{{ $applicant->id }}"
                                                                name="rate" value="2" />
                                                            <label for="star2-{{ $applicant->id }}" title="text">2
                                                                stars</label>
                                                            <input type="radio" id="star1-{{ $applicant->id }}"
                                                                name="rate" value="1" />
                                                            <label for="star1-{{ $applicant->id }}" title="text">1
                                                                star</label>
                                                        </div>
                                                    </div>

                                                    <div class="comment-box">
                                                        <p>Leave a comment:</p>
                                                        <textarea name="comment" cols="30" rows="5" style="width: 100%"></textarea>
                                                    </div>

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Save
                                                            changes</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>


                </div>
            @endforeach
        </div>
    </div>
@endsection
