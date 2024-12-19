<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Suspension Notice</title>
</head>
<body style="font-family: Arial, sans-serif; line-height: 1.6;">
    <div style="max-width: 600px; margin: 0 auto; padding: 20px; border: 1px solid #ddd; border-radius: 8px; background-color: #f9f9f9;">
        <h2 style="text-align: center; color: #333;">Notice of Account Suspension</h2>

        <p>Dear {{ $mailContent['userName'] }},</p>

        <p>We hope this message finds you well. Unfortunately, we need to inform you that your account on <strong>Felance</strong> has been suspended. This action was taken due to the following reason:<strong> {{ $mailContent['reason'] }} </strong></p>


        <h3 style="color: #333;">What This Means for You:</h3>
        <p>- Your account access has been disabled.</p>
        <p>- Any ongoing activities related to your account have been canceled.</p>

        <p>If you believe this suspension was made in error, or if you would like to appeal the decision, please contact us within <strong>7 days</strong> using the details below. Provide any relevant information or evidence to support your appeal.</p>

        <h3 style="color: #333;">How to Contact Us:</h3>
        <p>Email: <a href="mailto:felancegr@gmail.com">felancegr@gmail.com</a></p>
        <p>Phone: 0705334005</p>

        <p>We value all of our users and are committed to ensuring a safe and respectful environment for everyone. Thank you for your understanding.</p>

        <p>Best regards,</p>
        <p><strong>Felance Admin</strong></p>
    </div>
</body>
</html>
