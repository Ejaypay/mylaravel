<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GreetController;
use App\Http\Controllers\TaskController;

// ── Old Greet Activity ──────────────────────────────────────
Route::get('/hello', function () {
    return 'Hello, Laravel!';
});

Route::get('/greet', [GreetController::class, 'index']);

// ── Tasks CRUD (Resource Route) ─────────────────────────────
Route::resource('tasks', TaskController::class);