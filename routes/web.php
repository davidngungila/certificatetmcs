<?php

use App\Http\Controllers\CertificateController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Redirect root to dashboard
Route::get('/', function () {
    return redirect()->route('dashboard');
});

// All routes require authentication
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard.index');
    })->name('dashboard');

    Route::get('/members', [MemberController::class, 'index'])->name('members.index');
    Route::post('/members', [MemberController::class, 'store'])->name('members.store');
    Route::post('/members/bulk-import', [MemberController::class, 'bulkImport'])->name('members.bulk-import');

    Route::get('/certificates', function () {
        return view('certificates.index');
    })->name('certificates.index');

    Route::get('/templates', function () {
        return view('templates.index');
    })->name('templates.index');
    Route::get('/templates/designer', function () {
        return view('templates.designer');
    })->name('templates.designer');

    Route::get('/signatures', function () {
        return view('signatures.index');
    })->name('signatures.index');

    Route::get('/bulk', function () {
        return view('bulk.index');
    })->name('bulk.index');

    Route::get('/verification', function () {
        return view('verification.index');
    })->name('verification.index');

    Route::get('/reports', function () {
        return view('reports.index');
    })->name('reports.index');

    Route::get('/users', function () {
        return view('users.index');
    })->name('users.index');

    Route::get('/audit', function () {
        return view('audit.index');
    })->name('audit.index');

    Route::get('/settings', function () {
        return view('settings.index');
    })->name('settings.index');

    Route::get('/profile', function () {
        return view('profile.index');
    })->name('profile.index');

    // Breeze profile routes
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // PDF Generation
    Route::post('/certificates/generate-pdf', [CertificateController::class, 'generatePdf'])->name('certificates.generate-pdf');
});

require __DIR__.'/auth.php';
