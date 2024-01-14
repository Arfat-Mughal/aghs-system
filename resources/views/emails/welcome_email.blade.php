<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Our Website</title>
</head>
<body style="font-family: 'Arial', sans-serif;">

    <table style="max-width: 600px; margin: 0 auto; padding: 20px;">
        <tr>
            <td style="text-align: center; background-color: #f8f8f8; padding: 20px;">
                <h2>Welcome to Our Website</h2>
            </td>
        </tr>
        <tr>
            <td style="padding: 20px;">
                <p>Hello {{ $user->name }},</p>
                <p>Thank you for joining our community! We're excited to have you on board.</p>
                <p>You can now explore all the amazing features our website has to offer.</p>
                <p>If you have any questions or need assistance, feel free to reach out to us.</p>
                <p>Best regards,</p>
                <p>Your Website Team</p>
            </td>
        </tr>
        <tr>
            <td style="text-align: center; background-color: #f8f8f8; padding: 20px;">
                <p>&copy; {{ date('Y') }} Our Website. All rights reserved.</p>
            </td>
        </tr>
    </table>

</body>
</html>