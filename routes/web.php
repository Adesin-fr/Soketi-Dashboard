<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return redirect('/dashboard');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', [\App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');

    Route::get('/apps', [\App\Http\Controllers\AppController::class, 'index'])->name('apps.index');
    Route::get('/apps/create', [\App\Http\Controllers\AppController::class, 'create'])->name('apps.create');
    Route::post('/apps', [\App\Http\Controllers\AppController::class, 'store'])->name('apps.store');
});
