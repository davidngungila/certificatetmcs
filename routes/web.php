<?php

use App\Http\Controllers\CertificateController;
use App\Http\Controllers\CertificateTemplateController;
use App\Http\Controllers\MemberCategoryController;
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

    // Member routes
    Route::get('/members', [MemberController::class, 'index'])->name('members.index');
    Route::post('/members', [MemberController::class, 'store'])->name('members.store');
    Route::post('/members/bulk-import', [MemberController::class, 'bulkImport'])->name('members.bulk-import');
    
    // Member Category routes
    Route::post('/member-categories', [MemberCategoryController::class, 'store'])->name('member-categories.store');
    Route::put('/member-categories/{id}', [MemberCategoryController::class, 'update'])->name('member-categories.update');
    Route::delete('/member-categories/{id}', [MemberCategoryController::class, 'destroy'])->name('member-categories.destroy');

    // Certificate routes
    Route::get('/certificates', [CertificateController::class, 'index'])->name('certificates.index');
    Route::post('/certificates', [CertificateController::class, 'store'])->name('certificates.store');
    Route::put('/certificates/{id}', [CertificateController::class, 'update'])->name('certificates.update');
    Route::delete('/certificates/{id}', [CertificateController::class, 'destroy'])->name('certificates.destroy');
    Route::get('/certificates/{id}', [CertificateController::class, 'show'])->name('certificates.show');

    // Certificate Template routes
    Route::get('/templates', [CertificateTemplateController::class, 'index'])->name('templates.index');
    Route::post('/templates', [CertificateTemplateController::class, 'store'])->name('templates.store');
    Route::get('/templates/{id}', [CertificateTemplateController::class, 'show'])->name('templates.show');
    Route::get('/templates/{id}/edit', [CertificateTemplateController::class, 'edit'])->name('templates.edit');
    Route::put('/templates/{id}', [CertificateTemplateController::class, 'update'])->name('templates.update');
    Route::delete('/templates/{id}', [CertificateTemplateController::class, 'destroy'])->name('templates.destroy');

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
