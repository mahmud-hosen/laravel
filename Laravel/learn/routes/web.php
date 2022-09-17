<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('user/info');
});

Route::get('show', 'TeacherController@show')->name('show');