<?php


use Illuminate\Support\Facades\Route;

Route::get('/timeline', 'Api\Timeline\TimelineController@index');

Route::post('/tweet', 'Api\Tweets\TweetController@store');
