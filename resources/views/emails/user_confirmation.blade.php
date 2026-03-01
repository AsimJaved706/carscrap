<!DOCTYPE html>
<html>

<head>
    <title>We have received your car details</title>
</head>

<body style="font-family: Arial, sans-serif; line-height: 1.6; color: #333;">
    <p>Hi {{ $submission->full_name }},</p>

    <p>Thanks for contacting <strong>idontwantmycaranymore.co.uk</strong>.</p>

    <p>We have successfully received the details for your vehicle ({{ $submission->registration_number }}). One of our
        team members will review the details and call you shortly on <strong>{{ $submission->phone }}</strong> with your
        free, no-obligation cash quote.</p>

    <p>If you have any immediate questions, feel free to reply to this email.</p>

    <p>Best regards,<br>
        The Team at idontwantmycaranymore.co.uk</p>
</body>

</html>