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

Route::get('/projects/{id}', [ProjectController::class, 'show'])->name('projects.show');


