<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('dashboard');
});

Route::get('/dashboard', function () {
    return view('dashboard.index');
})->name('dashboard');

Route::get('/members', function () {
    return view('members.index');
})->name('members.index');

Route::get('/certificates', function () {
    return view('certificates.index');
})->name('certificates.index');

Route::get('/templates', function () {
    return view('templates.index');
})->name('templates.index');

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
