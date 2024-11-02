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
        <div class="contents order-2 order-md-1">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-md-6">
                        <div class="mb-2 d-flex" style="flex-direction: column; align-items: center;">
                            <img src="{{ asset('welcome_assets/images/logo_name.png') }}" style="width: 200px;">
                            <p class="mb-4"
                                style="margin-top: 10px; font-size: 18px; font-weight: bold; color: #000;">
                                Select account type
                            </p>
                            <form action="{{ route('selectRole') }}" method="POST">
                                @csrf
                                <input type="hidden" name="role_id" value="2"> 
                                <button type="submit" class="type-box mt-2 w-60" style="box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px; padding: 10px 20px; border: none; background: transparent">
                                    <img src="{{ asset('guest_assets/images/work.svg') }}" alt="">
                                    <span style="font-size: 20px; font-weight: bold;">I want to work</span>
                                    <i class="fa-solid fa-arrow-right-long" style="margin-left: 20px"></i>
                                </button>
                            </form>

                            <form action="{{ route('selectRole') }}" method="POST">
                                @csrf
                                <input type="hidden" name="role_id" value="3">
                                <button type="submit" class="type-box mt-5 w-60" style="box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px; padding: 10px 20px; border: none; background: transparent">
                                    <img src="{{ asset('guest_assets/images/hire.svg') }}" alt="">
                                    <span style="font-size: 20px; font-weight: bold; margin-left: 10px">I want to
                                        hire</span>
                                    <i class="fa-solid fa-arrow-right-long" style="margin-left: 20px"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
