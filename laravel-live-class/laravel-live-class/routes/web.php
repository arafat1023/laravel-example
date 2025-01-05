<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return 'hello world';
//    return view('welcome');
});

Route::get('/greeting', function () {
    return view('greeting');
});
