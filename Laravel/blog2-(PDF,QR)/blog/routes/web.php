<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/manage/brand','BrandController@manage_brand')->name('manage_brand');
Route::get('/manage/view/{id}','BrandController@brand_details')->name('brand_details');
Route::get('/manage/download/{id}','BrandController@brand_download')->name('brand_download');


Route::get('/customar/signup','BrandController@customar_signup_view')->name('customar_signup_view');
Route::post('/customar/signup/save','BrandController@customar_signup')->name('customar_signup');


Route::get('/qrcode','BrandController@qrcode')->name('qrcode');













