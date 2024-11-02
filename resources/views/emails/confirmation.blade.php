<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Email Confirmation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 5px;
        }

        .header {
            text-align: center;
            color: #333;
        }

        .content {
            padding: 20px;
            color: #555;
        }

        .button {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 15px;
            background-color: #29B2FE;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2 class="header">Email Confirmation</h2>
        <div class="content">Thank you for joining Felance. Now you will become a part of us</div>
        <p class="content">Please use the code below to complete your registration:</p>
        <h3 style="text-align: center; color: #333;">{{ $verificationCode }}</h3>
        <p class="content">If you did not request this, please ignore this email.</p>
    </div>
</body>

</html>
