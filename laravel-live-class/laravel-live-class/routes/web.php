<?php

use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request; // Import this namespace\

Route::get('/', function () {
//    return 'hello world';
    return view('home');
});

Route::get('/greeting', function () {
    return view('greeting');
});


Route::get('/users', [UserController::class, 'index']);

Route::get('/users/{id}', [UserController::class, 'show']); // Show a single user

Route::get('/add-user', [UserController::class, 'create']);

Route::post('/users', [UserController::class, 'store']); // Handle form submission





