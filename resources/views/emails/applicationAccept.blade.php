<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Application Accepted</title>
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
        <h2 class="header">Application Accepted</h2>
        <div class="content">
            <p>Dear {{ $mailContent['applicantName'] }},</p>
            <p>
                We are pleased to inform you that your application for the position of {{ $mailContent['jobTitle'] }} at {{ $mailContent['companyName'] }} has been accepted.
            </p>
            <p>
                Please check your list. If you have any questions, feel free to contact us.
            </p>
            <p>
                Thank you for your interest in Felance!
            </p>
            <p>Best regards,</p>
            <p>Felance</p>
        </div>
    </div>
</body>

</html>
