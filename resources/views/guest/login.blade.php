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
    <title>Felance| Login</title>
</head>

<body>
    <div class="d-lg-flex half min-vh-100">
        <div class="bg order-1 order-md-2"
            style="background-image: url('{{ asset('guest_assets/images/elephant_pic.jpg') }}')">
        </div>
        <div class="contents order-2 order-md-1" style="padding: 50px 0">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-md-6">
                        <div class="mb-4 d-flex" style="flex-direction: column; align-items: center;">
                            <img src="{{ asset('welcome_assets/images/logo_name.png') }}" style="width: 200px;">
                            <p class="mb-4"
                                style="margin-top: 10px; font-size: 18px; font-weight: bold; color: #000;">
                                Welcome back
                            </p>
                        </div>
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif
                        <form action="{{ route('postLogin') }}" method="post">
                            @csrf
                            <div class="form-group first mb-3">
                                <input type="email" class="form-control" id="email" placeholder="Email"
                                    name="email"
                                    style="font-size: 15px; color
                                #9f9f9f" required />
                            </div>
                            <div class="form-group last mb-3">
                                <div class="input-group">
                                    <input type="password" class="form-control" id="password" placeholder="Password"
                                        name="password"
                                        style="font-size: 15px; color
                                #9f9f9f"
                                        required />
                                    <span class="input-group-text"
                                        onclick="togglePasswordVisibility('password', 'toggleIcon1')"
                                        style="background: transparent; border: none;">
                                        <i class="fas fa-eye-slash" id="toggleIcon1"></i>
                                    </span>
                                </div>
                            </div>
                            @error('error')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                            <div class="d-flex align-items-center"
                                style="justify-content: flex-end; margin-bottom: 20px;">
                                <span class="ml-auto"><a href="{{ route('mailReset') }}" class="forgot-pass">Forgot
                                        Password</a></span>
                            </div>
                            <div class="login-btn d-flex" style="justify-content: center;">
                                <input type="submit" value="Log In" class="btn btn-block btn-primary"
                                    style="width: 100%;" />
                            </div>

                            {{-- <span class="d-block text-center my-4 text-muted">&mdash; or &mdash;</span>

                            <div class="social-login">
                                <a href="#" class="google btn d-flex justify-content-center align-items-center">
                                    <span class="icon-google mr-3"></span> Continue with Google
                                </a>
                            </div> --}}
                        </form>
                        <hr>
                        <div class="navigate-sign-in d-flex" style="justify-content: center">
                            <span>Don't have an account? </span>
                            <a href="{{ route('register') }}" style="color: #29B2FE; padding-left: 5px"> Sign up</a>
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
