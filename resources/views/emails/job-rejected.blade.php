<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Post Rejected on Felance</title>
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
        <h2 style="color: #FF0000;">Your job post has been rejected</h2>
        <p>Dear {{ $mailContent['employerName'] }},</p>
        <p>We regret to inform you that your job posting titled <strong>"{{ $mailContent['jobTitle'] }}"</strong> has been rejected
            due to the following reason(s):</p>
        {{-- <blockquote style="background-color: #f9f9f9; padding: 10px; border-left: 4px solid #FF0000; color: #333;">
            {{ $rejection_reason }}
        </blockquote> --}}
        <p>If you wish to resubmit your job post after making the necessary adjustments, please do so through your
            dashboard.</p>
        <br>
        <p>Best regards,</p>
        <p><strong>Felance</strong></p>
    </div>
</body>

</html>
