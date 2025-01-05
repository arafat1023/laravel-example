<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return 'hello world';
//    return view('welcome');
});

Route::get('/greeting', function () {
    return view('greeting');
});

//Route::get('/users', function () {
//    $users = ['John', 'Jane', 'Doe'];
//    return response()->json($users);
//});


Route::get('/users', function () {
    $users = ['John', 'Jane', 'Doe'];
    return view('users', compact('users'));
});
