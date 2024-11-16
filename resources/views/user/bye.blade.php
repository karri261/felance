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
                        </div>
                        <div style="text-align: center">
                            <strong style="font-size: 20px">Deactivated your account</strong>
                            <p class="text-fade">Sorry to see you go. #goodbye</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
