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

Route::get('/users/{id}', function ($id) {
    $user = User::find($id);

    if ($user) {
        return view('user', compact('user'));
    } else {
        return response('User not found', 404);
    }
});

Route::get('/add-user', function () {
    return view('add-user');
});


