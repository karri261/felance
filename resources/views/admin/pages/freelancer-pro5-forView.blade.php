@extends('admin.master')

@section('main-content')
    <div class="main-panel">
        <div class="content-wrapper" style="padding-top: 0">
            <div class="container appProfile">
                <div class="row">
                    <div class="col-lg-3 col-md-4 col-12">
                        <div class="box">
                            <div style="padding: 0 15px; margin-top: 10px">
                                <a href="{{ route('manage-user') }}"
                                    style="text-decoration: none; color: #1e1e1e; margin-top: 10px;">
                                    <i class="fa-solid fa-angle-left"></i> Back
                                </a>
                                <hr style="margin-top: 10px;">
                            </div>
                            <div class="box-body text-center" style="position: relative; flex-direction: column; padding-top: 0">
                                <div class="mb-20 mt-20">
                                    <img src="{{ asset($freelancer->avatar) }}" width="150" class="rounded-circle"  
                                        alt="user">
                                    <h4 class="mt-10 mb-10">{{ $userView->firstname }} {{ $userView->lastname }}</h4>
                                    <div href="mailto:dummy@gmail.com">{{ $userView->email }}</div>
                                </div>
                                <div class="social-links d-flex">
                                    <a href="{{ $freelancer->facebook }}" target="_blank">
                                        <i class="fa-brands fa-facebook"></i>
                                    </a>
                                    <a href="{{ $freelancer->instagram }}" target="_blank">
                                        <i class="fa-brands fa-instagram"></i>
                                    </a>
                                    <a href="{{ $freelancer->twitter }}" target="_blank">
                                        <i class="fa-brands fa-square-x-twitter"></i>
                                    </a>
                                    <a href="{{ $freelancer->linkedin }}" target="_blank">
                                        <i class="fa-brands fa-linkedin"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-9 col-md-8 col-12">
                        <div class="box">
                            <div class="box-body">
                                <div class="tab-content" style="border: none">
                                    <div class="tab-pane fade show active" id="pills-personal" role="tabpanel"
                                        aria-labelledby="pills-personal-tab">
                                        <h4 class="box-title fs-18 mb-0">
                                            Personal Details
                                        </h4>
                                        <hr>
                                        <ul class="list-unstyled clearfix fs-14">
                                            <li class="w-md-p50 float-start pb-10">
                                                <a href="" class="text-dark d-flex justify-content-between pe-50">
                                                    <span class="fw-500">Name: </span>
                                                    <span class="text-muted">{{ $userView->firstname }}
                                                        {{ $userView->lastname }}</span>
                                                </a>
                                            </li>
                                            <li class="w-md-p50 float-start pb-10">
                                                <a href="" class="text-dark d-flex justify-content-between">
                                                    <span class="fw-500">Address: </span>
                                                    <span class="text-muted">{{ $freelancer->address }}</span>
                                                </a>
                                            </li>
                                            <li class="w-md-p50 float-start pb-10">
                                                <a href="" class="text-dark d-flex justify-content-between pe-50">
                                                    <span class="fw-500">Languages: </span>
                                                    <span class="text-muted">{{ $freelancer->languages }}</span>
                                                </a>
                                            </li>
                                            <li class="w-md-p50 float-start pb-10">
                                                <a href="" class="text-dark d-flex justify-content-between">
                                                    <span class="fw-500">Email: </span>
                                                    <span class="text-muted">{{ $userView->email }}</span>
                                                </a>
                                            </li>
                                            <li class="w-md-p50 float-start pb-10">
                                                <a href="" class="text-dark d-flex justify-content-between pe-50">
                                                    <span class="fw-500">Phone: </span>
                                                    <span class="text-muted">{{ $freelancer->phone_number }}</span>
                                                </a>
                                            </li>
                                        </ul>
                                        <h4 class="box-title fs-18 mb-0 mt-20">
                                            About Me
                                        </h4>
                                        <hr>
                                        <p class="fs-14" style="text-align: justify">
                                            {{ $freelancer->bio }}
                                        </p>

                                        <h4 class="box-title fs-18 mb-0 mt-20">
                                            Featured Image
                                        </h4>
                                        <hr>
                                        <div class="popup-gallery d-flex justify-content-center">
                                            <div class="row" style="justify-content: center">
                                                @if (!empty($images) && is_array($images))
                                                    @foreach ($images as $image)
                                                        <div style="width: 300px; height: 300px; margin-top: 20px">
                                                            <img src="{{ asset($image) }}"
                                                                style="width: 100%; height: 100%; object-fit: cover">
                                                        </div>
                                                    @endforeach
                                                @else
                                                    <p class="text-muted fs-14">No images available</p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
