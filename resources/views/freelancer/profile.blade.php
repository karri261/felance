@extends('freelancer.master')
@section('title', 'Freelancer| Profile')

@section('main-content')
    <div class="container profile">
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
        <div class="row">
            <div class="col-lg-3 col-md-4 col-12">
                <div class="position-sticky" style="top: 150px">
                    <div class="box box-widget widget-user-2">
                        <div class="widget-user-header bg-secondary-light">
                            <div class="widget-user-image">
                                <img class="rounded-circle bg-danger" src="{{ asset($freelancer->avatar) }}"
                                    alt="User Avatar">
                            </div>
                            <h3 class="widget-user-username">{{ $user->firstname }} {{ $user->lastname }}</h3>
                            <h6 class="widget-user-desc fs-14 text-fade" style="text-transform: capitalize">
                                {{ $user->status }}</h6>
                        </div>
                        <div class="box-footer">
                            <ul class="nav d-block fs-16" id="pills-tab23" role="tablist">
                                <li class="nav-item">
                                    <a class="py-10 nav-link active" id="pills-edit-tab" data-bs-toggle="pill"
                                        href="#pills-edit" role="tab" aria-controls="pills-edit" aria-selected="true">
                                        <i class="fa-solid fa-pen"></i>
                                        <span class="path2"></span></span>Edit Profile
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="py-10 nav-link" id="pills-changePass-tab" data-bs-toggle="pill"
                                        href="#pills-changePass" role="tab" aria-controls="pills-changePass"
                                        aria-selected="true">
                                        <i class="fa-solid fa-gear"></i>
                                        <span class="path2"></span></span>
                                        Change Password
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="py-10 nav-link" id="pills-deactivate-tab" data-bs-toggle="pill"
                                        href="#pills-deactivate" role="tab" aria-controls="pills-deactivate"
                                        aria-selected="true">
                                        <i class="fa-solid fa-user-slash"></i>
                                        <span class="path2"></span></span>Deactive your account
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="py-10 nav-link" href="{{ route('logout') }}">
                                        <i class="fa-solid fa-power-off"></i>Logout
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-9 col-md-8 col-12">
                <div class="box">
                    <div class="box-body">
                        <div class="tab-content" id="pills-tabContent23">
                            <div class="tab-pane fade show active" id="pills-edit" role="tabpanel"
                                aria-labelledby="pills-edit-tab">
                                <div class="row">
                                    <div class="col-12">
                                        <form class="form" action="{{ route('freelancer.updateProfile') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div>
                                                <h4 class="box-title text-primary fs-18" style="color: #2196f3">
                                                    <i class="fa-regular fa-user"></i>
                                                    Edit Profile
                                                </h4>
                                                <hr class="my-15">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="form-label">First Name</label>
                                                            <input type="text" class="form-control"
                                                                placeholder="First Name" value="{{ $user->firstname }}"
                                                                name="firstname">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="form-label">Last Name</label>
                                                            <input type="text" class="form-control"
                                                                placeholder="Last Name" value="{{ $user->lastname }}"
                                                                name="lastname">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="form-label">Languages</label>
                                                            <input type="text" class="form-control"
                                                                placeholder="Languages"
                                                                value="{{ $freelancer->languages }}" name="languages">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label class="form-label" style="margin-right: 15px">Your CV</label>
                                                            <br>
                                                            <input type="file" name="cv" id="cv"
                                                                accept=".pdf,.doc,.docx" onchange="updateFileName()"
                                                                style="display: none;">
                                                            <button type="button" style="border: none; padding: 5px 10px"
                                                                onclick="document.getElementById('cv').click()">Choose
                                                                File</button>
                                                            <span id="file-name">
                                                                @if ($freelancer->cv_path)
                                                                    {{ basename($freelancer->cv_path) }}
                                                                @else
                                                                    No file chosen
                                                                @endif
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group d-flex">
                                                            <label class="form-label">Avatar</label>
                                                            <br>
                                                            <img id="avatarImg" class="rounded-circle bg-danger"
                                                                src="{{ asset($freelancer->avatar) }}" alt="User Avatar"
                                                                style="cursor: pointer; width: 100px;">
                                                            <input type="file" name="avatar" id="avatarInput"
                                                                style="display: none;" accept="image/*">
                                                        </div>
                                                    </div>
                                                </div>
                                                <h4 class="box-title text-primary mt-30 fs-18">
                                                    <i class="fa-regular fa-address-book"></i>
                                                    Contact Info &amp; Bio
                                                </h4>
                                                <hr class="my-15">
                                                <div class="form-group">
                                                    <label class="form-label">Address</label>
                                                    <input class="form-control" type="text" placeholder="Address"
                                                        value="{{ $freelancer->address }}" name="address">
                                                </div>
                                                <div class="form-group">
                                                    <label class="form-label">Email</label>
                                                    <input class="form-control" type="email" placeholder="Email"
                                                        value="{{ $user->email }}" readonly>
                                                </div>
                                                <div class="form-group">
                                                    <label class="form-label">Contact Number</label>
                                                    <input class="form-control" type="tel"
                                                        placeholder="Contact Number"
                                                        value="{{ $freelancer->phone_number }}" name="phone_number">
                                                </div>
                                                <div class="form-group">
                                                    <label class="form-label">Bio</label>
                                                    <textarea rows="4" class="form-control" placeholder="Bio" name="bio">
                                                            {{ $freelancer->bio }}
                                                        </textarea>
                                                </div>
                                                <h4 class="box-title text-primary mt-30 fs-18">
                                                    <i class="fa-solid fa-share-from-square"></i>
                                                    Social Profile
                                                </h4>
                                                <hr class="my-15">
                                                <div class="form-group">
                                                    <label class="form-label">Facebook</label>
                                                    <input class="form-control" type="text" placeholder="Facebook"
                                                        value="{{ $freelancer->facebook }}" name="facebook">
                                                </div>
                                                <div class="form-group">
                                                    <label class="form-label">Twitter</label>
                                                    <input class="form-control" type="text" placeholder="Twitter"
                                                        value="{{ $freelancer->twitter }}" name="twitter">
                                                </div>
                                                <div class="form-group">
                                                    <label class="form-label">Instagram</label>
                                                    <input class="form-control" type="text" placeholder="Instagram"
                                                        value="{{ $freelancer->instagram }}" name="instagram">
                                                </div>
                                                <div class="form-group">
                                                    <label class="form-label">Linkedin</label>
                                                    <input class="form-control" type="text" placeholder="Linkedin"
                                                        value="{{ $freelancer->linkedin }}" name="linkedin">
                                                </div>
                                                <h4 class="box-title text-primary mt-30 fs-18">
                                                    <i class="fa-regular fa-images"></i>
                                                    Featured photo
                                                </h4>
                                                <hr class="my-15">
                                                <div class="row">
                                                    @for ($i = 0; $i < 6; $i++)
                                                        <div class="col-lg-4" style="margin: 30px 0">
                                                            <div class="form-group d-flex justify-content-center">
                                                                @if (isset($imagePaths[$i]))
                                                                    <button type="button"
                                                                        style="border: none; width: 270px; height: 270px;"
                                                                        onclick="document.getElementById('image{{ $i + 1 }}').click()">
                                                                        <img id="imagePreview{{ $i + 1 }}"
                                                                            src="{{ asset($imagePaths[$i]) }}"
                                                                            alt="Image Preview"
                                                                            style="width: 100%; height: 100%; object-fit: cover;">
                                                                    </button>
                                                                    <input class="form-control" type="file"
                                                                        name="image[]" id="image{{ $i + 1 }}"
                                                                        style="display: none"
                                                                        onchange="updateImage({{ $i + 1 }})">
                                                                @else
                                                                    <input class="form-control" type="file"
                                                                        name="image[]" id="image{{ $i + 1 }}"
                                                                        style="display: none"
                                                                        onchange="updateImage({{ $i + 1 }})">
                                                                    <button type="button"
                                                                        style="border: none; width: 270px; height: 270px;"
                                                                        onclick="document.getElementById('image{{ $i + 1 }}').click()">
                                                                        <span id="imageText{{ $i + 1 }}"
                                                                            style="font-size: 2 em; display: block;">+</span>
                                                                        <img id="imagePreview{{ $i + 1 }}"
                                                                            src="" alt="Image Preview"
                                                                            style="width: 100%; height: 100%; object-fit: cover; display: none;">
                                                                    </button>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    @endfor
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-end">
                                                <button type="submit" class="btn btn-success" style="margin: 0 5px">
                                                    <i class="fa-regular fa-floppy-disk"></i> Save changes
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-changePass" role="tabpanel"
                                aria-labelledby="pills-changPass-tab">
                                <div class="row">
                                    <div class="col-12">
                                        <form class="form" action="{{ route('freelancer.changePassword') }}"
                                            method="POST">
                                            @csrf
                                            <div>
                                                <h4 class="box-title text-primary fs-18" style="color: #29B2FE">
                                                    <i class="fa-solid fa-unlock-keyhole"></i>
                                                    Change Password
                                                </h4>
                                                <hr class="my-15">
                                                <div class="row">
                                                    <div class="col-md-8">
                                                        <div class="form-group">
                                                            <label class="form-label">Current Password</label>
                                                            <div class="input-group">
                                                                <input type="password" class="form-control"
                                                                    id="current-password" placeholder="Current Password"
                                                                    name="current-password">
                                                                <span class="input-group-text"
                                                                    onclick="togglePasswordVisibility('current-password', 'toggleIcon1')"
                                                                    style="background: transparent; border: none;">
                                                                    <i class="fas fa-eye-slash" id="toggleIcon1"></i>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-8">
                                                        <div class="form-group">
                                                            <label class="form-label">New Password</label>
                                                            <div class="input-group">
                                                                <input type="password" class="form-control"
                                                                    id="new-password" placeholder="New Password"
                                                                    name="new-password">
                                                                <span class="input-group-text"
                                                                    onclick="togglePasswordVisibility('new-password', 'toggleIcon2')"
                                                                    style="background: transparent; border: none;">
                                                                    <i class="fas fa-eye-slash" id="toggleIcon2"></i>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-8">
                                                        <div class="form-group">
                                                            <label class="form-label">Confirm New Password</label>
                                                            <div class="input-group">
                                                                <input type="password" class="form-control"
                                                                    id="new-password_confirmation"
                                                                    name="new-password_confirmation"
                                                                    placeholder="Confirm New Password">
                                                                <span class="input-group-text"
                                                                    onclick="togglePasswordVisibility('new-password_confirmation', 'toggleIcon3')"
                                                                    style="background: transparent; border: none;">
                                                                    <i class="fas fa-eye-slash" id="toggleIcon3"></i>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-end mt-20">
                                                <button type="submit" class="btn btn-success" style="margin: 0 5px">
                                                    <i class="fa-regular fa-floppy-disk"></i> Save changes
                                                </button>
                                                {{-- <button type="button" class="btn btn-danger" style="margin: 0 5px">
                                                        <i class="fa-solid fa-trash-can"></i> Cancel
                                                    </button> --}}
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-deactivate" role="tabpanel"
                                aria-labelledby="pills-deactivate-tab">
                                <div class="row">
                                    <div class="col-12">
                                        <form class="form" method="POST"
                                            action="{{ route('freelancer.deactivateAccount') }}">
                                            @csrf
                                            <div>
                                                <h4 class="box-title text-primary fs-18" style="color: #29B2FE">
                                                    <i class="fa-solid fa-unlock-keyhole"></i>
                                                    Deactivate Account
                                                </h4>
                                                <hr class="my-15">
                                                <h5>This will deactivate your account</h5>
                                                <p class="text-fade">You're about to start the process of deactivating
                                                    your Felance account. Your display name and public profile will no
                                                    longer be viewable on Felance.</p>
                                                <hr>
                                                <h5>What else you should know</h5>
                                                <p class="text-fade"> You can restore your account if it was
                                                    accidentally or wrongfully deactivated.</p>
                                                <hr>
                                                <h5>Confirm your password</h5>
                                                <p class="text-fade">Complete your deactivation request by entering the
                                                    password associated with your account.</p>
                                                <div class="row">
                                                    <div class="col-md-8">
                                                        <div class="form-group">
                                                            <div class="input-group">
                                                                <input type="password" class="form-control"
                                                                    id="password" name="password"
                                                                    placeholder="Confirm Your Password">
                                                                <span class="input-group-text"
                                                                    onclick="togglePasswordVisibility('new-password_confirmation', 'toggleIcon3')"
                                                                    style="background: transparent; border: none;">
                                                                    <i class="fas fa-eye-slash" id="toggleIcon3"></i>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-end mt-20">
                                                <button type="sumit" class="btn btn-danger" style="margin: 0 5px">
                                                    Deactivate
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function togglePasswordVisibility(passwordId, iconId) {
            const passwordField = document.getElementById(passwordId);
            const toggleIcon = document.getElementById(iconId);

            if (passwordField.type === "password") {
                passwordField.type = "text";
                toggleIcon.classList.remove("fa-eye-slash");
                toggleIcon.classList.add("fa-eye");
            } else {
                passwordField.type = "password";
                toggleIcon.classList.remove("fa-eye");
                toggleIcon.classList.add("fa-eye-slash");
            }
        }

        document.getElementById("avatarImg").addEventListener("click", function() {
            document.getElementById("avatarInput").click(); // Mở hộp thoại chọn file
        });

        // Hiển thị ảnh mới được chọn vào thẻ img
        document.getElementById("avatarInput").addEventListener("change", function(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById("avatarImg").src = e.target.result; // Hiển thị ảnh mới
                };
                reader.readAsDataURL(file);
            }
        });

        setTimeout(function() {
            var alertError = document.getElementById('alert-error');
            var alertSuccess = document.getElementById('alert-success');

            if (alertError) {
                alertError.classList.remove('show');
                alertError.classList.add('fade');
            }

            if (alertSuccess) {
                alertSuccess.classList.remove('show');
                alertSuccess.classList.add('fade');
            }
        }, 3000)

        function updateFileName() {
            var input = document.getElementById('cv');
            var fileName = input.files.length ? input.files[0].name : "No file chosen";
            document.getElementById('file-name').textContent = fileName;
        }

        function updateImage(index) {
            var imageInput = document.getElementById(`image${index}`);
            
            var imagePreview = document.getElementById(`imagePreview${index}`);
            var imageText = document.getElementById(`imageText${index}`);

            if (imageInput.files && imageInput.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    imagePreview.src = e.target.result;
                    imagePreview.style.display = 'block';
                    imageText.style.display = 'none';
                };

                reader.readAsDataURL(imageInput.files[0]);
            } else {
                imagePreview.src = '';
                imagePreview.style.display = 'none';
                imageText.style.display = 'block';
            }
        }
    </script>
@endsection
