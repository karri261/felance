<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('guest_assets/style.css') }}">
    <title>Felance| Register</title>
</head>

<body>
    <div class="d-lg-flex half min-vh-100">
        <div class="bg order-1 order-md-2"
            style="background-image: url('{{ asset('guest_assets/images/elephant_pic.jpg') }}')"></div>
        <div class="contents order-2 order-md-1" style="margin-top: 20px">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-md-6">
                        <div class="mb-2 d-flex" style="flex-direction: column; align-items: center;">
                            <img src="{{ asset('welcome_assets/images/logo_name.png') }}" style="width: 200px;">
                            <p class="mb-2"
                                style="margin-top: 10px; font-size: 18px; font-weight: bold; color: #000;">
                                Sign in
                            </p>
                        </div>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="{{ route('postRegister') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col form-group">
                                    <input type="text" class="form-control" id="first-name" placeholder="First Name"
                                        name="firstname" required />
                                </div>
                                <div class="col form-group">
                                    <input type="text" class="form-control" id="last-name" placeholder="Last Name"
                                        name="lastname" required />
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group mt-3">
                                    <input type="email" class="form-control" id="email" placeholder="Email"
                                        name="email" required />
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group mt-3">
                                    <div class="input-group">
                                        <input type="password" class="form-control" id="password"
                                            placeholder="Password" name="password" required />
                                            
                                        <span class="input-group-text"
                                            onclick="togglePasswordVisibility('password', 'toggleIcon1')"
                                            style="background: transparent; border: none;">
                                            <i class="fas fa-eye-slash" id="toggleIcon1"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group mt-3">
                                    <div class="input-group">
                                        <input type="password" class="form-control" id="confirmPassword"
                                            placeholder="Confirm Password" name="password_confirmation" required />

                                        <span class="input-group-text"
                                            onclick="togglePasswordVisibility('confirmPassword', 'toggleIcon2')"
                                            style="background: transparent; border: none;">
                                            <i class="fas fa-eye-slash" id="toggleIcon2"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="checkbox-container mt-3 d-flex">
                                <input type="checkbox" id="agree" name="agree">
                                <label for="agree" style="padding-left: 5px">
                                    I agree to the <span style="color: #29B2FE">User Agreement</span> and <span
                                        style="color: #29B2FE">Privacy Policy</span>
                                </label>
                            </div>

                            <button type="submit" class="btn btn-primary w-100 mt-4">
                                Join Felance
                            </button>

                            {{-- <span class="d-block text-center my-2 text-muted">&mdash; or &mdash;</span>

                            <div class="social-login">
                                <a href="#" class="google btn d-flex justify-content-center align-items-center">
                                    <span class="icon-google mr-3"></span> Continue with Google
                                </a>
                            </div> --}}
                        </form>
                        <hr>
                        <div class="navigate-sign-in d-flex" style="justify-content: center">
                            <span>Already have an account? </span>
                            <a href="{{ route('login') }}" style="color: #29B2FE; padding-left: 5px"> Login</a>
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
    </script>
</body>

</html>
