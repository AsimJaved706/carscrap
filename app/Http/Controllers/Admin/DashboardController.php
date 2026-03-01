<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\CarSubmission;

class DashboardController extends Controller
{
    public function index()
    {
        $totalSubmissions = CarSubmission::count();
        $newSubmissions = CarSubmission::where('status', 'new')->count();

        return view('admin.dashboard', compact('totalSubmissions', 'newSubmissions'));
    }
}
