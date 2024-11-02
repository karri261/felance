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
            style="background-image: url('{{ asset('guest_assets/images/elephant_pic.jpg') }}')"></div>
        <div class="contents order-2 order-md-1">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-md-6">
                        <div class="mb-4 d-flex" style="flex-direction: column; align-items: center;">
                            <img src="{{ asset('welcome_assets/images/logo_name.png') }}" style="width: 200px;">
                            <p class="mb-4"
                                style="margin-top: 10px; font-size: 18px; font-weight: bold; color: #000;">
                                Reset your password
                            </p>
                        </div>
                        @if (session('message'))
                            <div class="alert alert-success">
                                {{ session('message') }}
                            </div>
                        @endif
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="{{ route('postResetPass') }}" method="post"
                            onsubmit="console.log('Form is submitted');">
                            @csrf
                            <input type="hidden" name="email" value="{{ session('resetEmail') }}">

                            <div class="form-group last mb-3">
                                <div class="input-group">
                                    <input type="password" class="form-control" id="new-password"
                                        placeholder="New password" name="new-password"
                                        style="font-size: 15px; color
                                #9f9f9f"
                                        required />
                                    <span class="input-group-text"
                                        onclick="togglePasswordVisibility('new-password', 'toggleIcon1')"
                                        style="background: transparent; border: none;">
                                        <i class="fas fa-eye-slash" id="toggleIcon1"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="form-group last mb-3">
                                <div class="input-group">
                                    <input type="password" class="form-control" id="new-password_confirmation"
                                        placeholder="Confirm new password" name="new-password_confirmation"
                                        style="font-size: 15px; color
                                #9f9f9f"
                                        required />
                                    <span class="input-group-text"
                                        onclick="togglePasswordVisibility('new-password_confirmation', 'toggleIcon2')"
                                        style="background: transparent; border: none;">
                                        <i class="fas fa-eye-slash" id="toggleIcon1"></i>
                                    </span>
                                </div>

                            </div>
                            <div class="form-group last mb-3 d-flex">
                                <input type="text" name="code" class="form-control"
                                    placeholder="Enter verification code" required>
                            </div>
                            <div class="login-btn d-flex" style="justify-content: center;">
                                <input type="submit" value="Save" class="btn btn-block btn-primary"
                                    style="width: 100%;" />
                            </div>
                        </form>
                        <form action="{{ route('resendResetCode') }}" method="POST">
                            @csrf
                            <input type="hidden" name="email" value="{{ session('resetEmail') }}">
                            <button type="submit" class="btn btn-secondary w-100 mt-3">Resend Code</button>
                        </form>
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
