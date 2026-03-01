<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\CarSubmissionController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AdminCarSubmissionController;
use App\Http\Controllers\Admin\SettingController;

Route::middleware(['auth', 'verified'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/submissions', [AdminCarSubmissionController::class, 'index'])->name('submissions.index');
    Route::get('/submissions/{submission}', [AdminCarSubmissionController::class, 'show'])->name('submissions.show');
    Route::patch('/submissions/{submission}/status', [AdminCarSubmissionController::class, 'updateStatus'])->name('submissions.update_status');
    Route::delete('/submissions/{submission}', [AdminCarSubmissionController::class, 'destroy'])->name('submissions.destroy');

    Route::get('/settings', [SettingController::class, 'edit'])->name('settings.edit');
    Route::post('/settings', [SettingController::class, 'update'])->name('settings.update');
});

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/quote', [HomeController::class, 'quote'])->name('quote');
Route::post('/submit', [CarSubmissionController::class, 'store'])->name('submit');
Route::get('/thank-you', [HomeController::class, 'thankYou'])->name('thank-you');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
