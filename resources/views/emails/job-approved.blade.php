<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Post Approved on Felance</title>
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
        <h2 style="color: #4CAF50;">Your job post has been approved!</h2>
        <p>Dear {{ $mailContent['employerName'] }},</p>
        <p>We are pleased to inform you that your job posting titled <strong>"{{ $mailContent['jobTitle'] }}"</strong> has been
            successfully approved and is now live on our platform.</p>
        {{-- <p>You can view your job post here: <a href="{{ $job_url }}" style="color: #1E90FF;">{{ $job_url }}</a>
        </p> --}}
        <p>If you have any questions, feel free to contact our support team.</p>
        <br>
        <p>Best regards,</p>
        <p><strong>Felance</strong></p>
    </div>
</body>

</html>
