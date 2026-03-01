<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\CarSubmission;
use App\Http\Requests\StoreCarSubmissionRequest;
use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Facades\Mail;
use App\Mail\AdminSubmissionMail;
use App\Mail\UserConfirmationMail;

class CarSubmissionController extends Controller
{
    public function store(StoreCarSubmissionRequest $request)
    {
        $validated = $request->validated();

        $photoPaths = [];
        if ($request->hasFile('photos')) {
            foreach ($request->file('photos') as $photo) {
                // store in storage/app/public/uploads
                $path = $photo->store('uploads', 'public');
                $photoPaths[] = $path;
            }
        }

        // Convert boolean fields if they come as strings '1' or '0'
        $validated['v5_present'] = filter_var($request->input('v5_present', false), FILTER_VALIDATE_BOOLEAN);
        $validated['keys_present'] = filter_var($request->input('keys_present', false), FILTER_VALIDATE_BOOLEAN);
        $validated['driveable'] = filter_var($request->input('driveable', false), FILTER_VALIDATE_BOOLEAN);

        $validated['photos'] = $photoPaths;

        $submission = CarSubmission::create($validated);

        // Dispatch Emails
        $adminEmail = config('mail.from.address', 'hello@example.com');
        Mail::to($adminEmail)->send(new AdminSubmissionMail($submission));

        if ($submission->email) {
            Mail::to($submission->email)->send(new UserConfirmationMail($submission));
        }

        return redirect()->route('thank-you')->with('success', 'Your submission has been received.');
    }
}
