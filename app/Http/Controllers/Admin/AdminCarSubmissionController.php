<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\CarSubmission;

class AdminCarSubmissionController extends Controller
{
    public function index(Request $request)
    {
        $query = CarSubmission::query()->latest();

        // Filter by status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // Search by phone or registration
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('phone', 'like', "%{$search}%")
                    ->orWhere('registration_number', 'like', "%{$search}%");
            });
        }

        $submissions = $query->paginate(15)->withQueryString();

        return view('admin.submissions.index', compact('submissions'));
    }

    public function show(CarSubmission $submission)
    {
        return view('admin.submissions.show', compact('submission'));
    }

    public function updateStatus(Request $request, CarSubmission $submission)
    {
        $validated = $request->validate([
            'status' => 'required|in:new,contacted,completed'
        ]);

        $submission->update(['status' => $validated['status']]);

        return redirect()->back()->with('status', 'Submission status updated successfully.');
    }

    public function destroy(CarSubmission $submission)
    {
        $submission->delete();

        return redirect()->route('admin.submissions.index')->with('status', 'Submission deleted successfully.');
    }
}
