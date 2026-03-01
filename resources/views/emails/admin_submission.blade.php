<!DOCTYPE html>
<html>

<head>
    <title>New Car Submission</title>
</head>

<body style="font-family: Arial, sans-serif; line-height: 1.6; color: #333;">
    <h2>New Car Scrap Submission</h2>
    <p>A new submission has been received. Details are below:</p>

    <table border="1" cellpadding="8" cellspacing="0" style="border-collapse: collapse; width: 100%; max-width: 600px;">
        <tr>
            <th align="left" style="background-color: #f4f4f4; width: 35%;">Name</th>
            <td>{{ $submission->full_name }}</td>
        </tr>
        <tr>
            <th align="left" style="background-color: #f4f4f4;">Phone</th>
            <td>{{ $submission->phone }}</td>
        </tr>
        <tr>
            <th align="left" style="background-color: #f4f4f4;">Email</th>
            <td>{{ $submission->email ?? 'N/A' }}</td>
        </tr>
        <tr>
            <th align="left" style="background-color: #f4f4f4;">Postcode</th>
            <td>{{ $submission->postcode }}</td>
        </tr>
        <tr>
            <th align="left" style="background-color: #f4f4f4;">Registration</th>
            <td>{{ $submission->registration_number ?? 'N/A' }}</td>
        </tr>
        <tr>
            <th align="left" style="background-color: #f4f4f4;">Make / Model / Year</th>
            <td>{{ $submission->make ?? 'N/A' }} / {{ $submission->model ?? 'N/A' }} / {{ $submission->year ?? 'N/A' }}
            </td>
        </tr>
        <tr>
            <th align="left" style="background-color: #f4f4f4;">Condition</th>
            <td>{{ $submission->condition ?? 'N/A' }}</td>
        </tr>
        <tr>
            <th align="left" style="background-color: #f4f4f4;">V5 Present?</th>
            <td>{{ $submission->v5_present ? 'Yes' : 'No' }}</td>
        </tr>
        <tr>
            <th align="left" style="background-color: #f4f4f4;">Keys Present?</th>
            <td>{{ $submission->keys_present ? 'Yes' : 'No' }}</td>
        </tr>
        <tr>
            <th align="left" style="background-color: #f4f4f4;">Driveable?</th>
            <td>{{ $submission->driveable ? 'Yes' : 'No' }}</td>
        </tr>
        <tr>
            <th align="left" style="background-color: #f4f4f4;">Message</th>
            <td>{{ $submission->message ?? 'None' }}</td>
        </tr>
    </table>

    <p style="margin-top: 20px;">
        <em>Photos are attached (if any were uploaded).</em><br>
        <a href="{{ url('/admin') }}">Log in to Admin Panel to manage this submission.</a>
    </p>
</body>

</html>