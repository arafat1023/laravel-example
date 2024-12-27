<?php

use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;

// Welcome and About routes
//Route::get('/', function () {
//    return view('welcome');
//})->name('welcome');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/', WelcomeController::class);

// Project resource routes using ProjectController
Route::resource('projects', ProjectController::class);

// **Optional (if you didn't implement route model binding in show method):**
// Route::get('/projects/{id}', [ProjectController::class, 'show'])->name('projects.show');
