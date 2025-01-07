<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
//    return 'hello world';
    return view('home');
});

Route::get('/greeting', function () {
    return view('greeting');
});

Route::get('/users', function () {
    $users = User::all();
    return view('users', compact('users'));
});
