<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/{any}', function () {
    return view('index');  // This serves your React app
})->where('any', '.*');  // This handles all routes that React manages