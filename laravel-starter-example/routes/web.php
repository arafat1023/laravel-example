<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/example', function () {
    return view('example');
});

Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');

//Route::get('/projects/{id}', [ProjectController::class, 'show'])->name('projects.show');

Route::get('/projects/{project}', [ProjectController::class, 'show'])->name('projects.show');

Route::get('/about', function () {
    return view('about');
});




