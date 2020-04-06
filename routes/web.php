<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

auth()->loginUsingId(1);

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
