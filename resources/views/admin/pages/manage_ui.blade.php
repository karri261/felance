@extends('admin.master')

@section('main-content')
    <div class="main-panel">
        <div class="content-wrapper" id="manage-user-content-wrapper">
            <div class="row">
                <div class="col-sm-12">
                    <div class="home-tab">
                        <div class="d-sm-flex align-items-center justify-content-between border-bottom">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active ps-0" id="session-1" data-bs-toggle="tab" href="#session1"
                                        role="tab" aria-controls="overview" aria-selected="true">Session 1</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="session-2" data-bs-toggle="tab" href="#session2" role="tab"
                                        aria-selected="false">Session 2</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="brand-logo" data-bs-toggle="tab" href="#brandlogo"
                                        role="tab" aria-selected="false">Brand Logo</a>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content tab-content-basic">
                            <div class="tab-pane fade show active" id="session1" role="tabpanel"
                                aria-labelledby="freelancers">
                                <div class="row image-session1">
                                    <img src="{{ asset($session1->image_path) }}" class="image_hero" alt="Session Image">
                                </div>
                                <div class="row link-session1">
                                    <!-- Tải ảnh mới -->
                                    <form class="link-form" action="{{ route('upload.imageSession1') }}" method="POST"
                                        enctype="multipart/form-data" lang="en">
                                        @csrf
                                        <input type="file" id="image" name="image" accept="image/*" required>
                                        <div class="link-and-btn">
                                            <a href="{{ url('/') }}" class="link-preview" target="_blank">Link Preview</a>
                                            <button class="save-btn" type="submit">Save Image</button>
                                        </div>
                                    </form>
                                </div>

                            </div>
                            <div class="tab-pane fade " id="session2" role="tabpanel" aria-labelledby="employers">
                                <div class="parent-session2">
                                    <div class="image-card">
                                        <div class="row image2">
                                            <img src="{{ asset($session2_id2->image_path) }}" class="image_session2"
                                                alt="Session Image">
                                        </div>
                                        <div class="row link-session1">
                                            <form class="link-form" action="{{ route('upload.imageSession2', ['imageId' => 2]) }}" method="POST"
                                                enctype="multipart/form-data" lang="en">
                                                @csrf
                                                <input type="file" id="image" name="image" accept="image/*" required>
                                                <div class="link-and-btn">
                                                    <button class="save-btn" type="submit">Save Image</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="image-card">
                                        <div class="row image2">
                                            <img src="{{ asset($session2_id3->image_path) }}" class="image_session2"
                                                alt="Session Image">
                                        </div>
                                        <div class="row link-session1">
                                            <form class="link-form" action="{{ route('upload.imageSession2', ['imageId' => 3]) }}" method="POST"
                                                enctype="multipart/form-data" lang="en">
                                                @csrf
                                                <input type="file" id="image" name="image" accept="image/*" required>
                                                <div class="link-and-btn">
                                                    <button class="save-btn" type="submit">Save Image</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="image-card">
                                        <div class="row image2">
                                            <img src="{{ asset($session2_id4->image_path) }}" class="image_session2"
                                                alt="Session Image">
                                        </div>
                                        <div class="row link-session1">
                                            <form class="link-form" action="{{ route('upload.imageSession2', ['imageId' => 4]) }}" method="POST"
                                                enctype="multipart/form-data" lang="en">
                                                @csrf
                                                <input type="file" id="image" name="image" accept="image/*" required>
                                                <div class="link-and-btn">
                                                    <button class="save-btn" type="submit">Save Image</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="image-card">
                                        <div class="row image2">
                                            <img src="{{ asset($session2_id5->image_path) }}" class="image_session2"
                                                alt="Session Image">
                                        </div>
                                        <div class="row link-session1">
                                            <form class="link-form" action="{{ route('upload.imageSession2', ['imageId' => 5]) }}" method="POST"
                                                enctype="multipart/form-data" lang="en">
                                                @csrf
                                                <input type="file" id="image" name="image" accept="image/*" required>
                                                <div class="link-and-btn">
                                                    <button class="save-btn" type="submit">Save Image</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="link-pre-session2">
                                    <a href="{{ url('/#session2') }}" class="link-preview" target="_blank">Link Preview</a>
                                </div>
                            </div>
                            <div class="tab-pane fade " id="brandlogo" role="tabpanel" aria-labelledby="employers">
                                <div class="parent-brandlogo">
                                    <div class="image-card">
                                        <div class="row image2">
                                            <img src="{{ asset($brandlogo_id6->image_path) }}" class="image_brandlogo"
                                                alt="Session Image">
                                        </div>
                                        <div class="row link-session1">
                                            <form class="link-form" action="{{ route('upload.imageSession2', ['imageId' => 6]) }}" method="POST"
                                                enctype="multipart/form-data" lang="en">
                                                @csrf
                                                <input type="file" id="image" name="image" accept="image/*" required>
                                                <div class="link-and-btn">
                                                    <button class="save-btn" type="submit">Save Image</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="image-card">
                                        <div class="row image2">
                                            <img src="{{ asset($brandlogo_id7->image_path) }}" class="image_brandlogo"
                                                alt="Session Image">
                                        </div>
                                        <div class="row link-session1">
                                            <form class="link-form" action="{{ route('upload.imageSession2', ['imageId' => 7]) }}" method="POST"
                                                enctype="multipart/form-data" lang="en">
                                                @csrf
                                                <input type="file" id="image" name="image" accept="image/*" required>
                                                <div class="link-and-btn">
                                                    <button class="save-btn" type="submit">Save Image</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="image-card">
                                        <div class="row image2">
                                            <img src="{{ asset($brandlogo_id8->image_path) }}" class="image_brandlogo"
                                                alt="Session Image">
                                        </div>
                                        <div class="row link-session1">
                                            <form class="link-form" action="{{ route('upload.imageSession2', ['imageId' => 8]) }}" method="POST"
                                                enctype="multipart/form-data" lang="en">
                                                @csrf
                                                <input type="file" id="image" name="image" accept="image/*" required>
                                                <div class="link-and-btn">
                                                    <button class="save-btn" type="submit">Save Image</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="image-card">
                                        <div class="row image2">
                                            <img src="{{ asset($brandlogo_id9->image_path) }}" class="image_brandlogo"
                                                alt="Session Image">
                                        </div>
                                        <div class="row link-session1">
                                            <form class="link-form" action="{{ route('upload.imageSession2', ['imageId' => 9]) }}" method="POST"
                                                enctype="multipart/form-data" lang="en">
                                                @csrf
                                                <input type="file" id="image" name="image" accept="image/*" required>
                                                <div class="link-and-btn">
                                                    <button class="save-btn" type="submit">Save Image</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="image-card">
                                        <div class="row image2">
                                            <img src="{{ asset($brandlogo_id10->image_path) }}" class="image_brandlogo"
                                                alt="Session Image">
                                        </div>
                                        <div class="row link-session1">
                                            <form class="link-form" action="{{ route('upload.imageSession2', ['imageId' => 10]) }}" method="POST"
                                                enctype="multipart/form-data" lang="en">
                                                @csrf
                                                <input type="file" id="image" name="image" accept="image/*" required>
                                                <div class="link-and-btn">
                                                    <button class="save-btn" type="submit">Save Image</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="image-card">
                                        <div class="row image2">
                                            <img src="{{ asset($brandlogo_id11->image_path) }}" class="image_brandlogo"
                                                alt="Session Image">
                                        </div>
                                        <div class="row link-session1">
                                            <form class="link-form" action="{{ route('upload.imageBrandlogo', ['imageId' => 11]) }}" method="POST"
                                                enctype="multipart/form-data" lang="en">
                                                @csrf
                                                <input type="file" id="image" name="image" accept="image/*" required>
                                                <div class="link-and-btn">
                                                    <button class="save-btn" type="submit">Save Image</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="link-pre-session2">
                                    <a href="{{ url('/') }}" class="link-preview" target="_blank">Link Preview</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
    </div>
@endsection
