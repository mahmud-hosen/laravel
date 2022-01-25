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

Route::get('/','FrontEndController@home')->name('website');
Route::get('/Contact','FrontEndController@Contact')->name('website.contact');
Route::get('/about','FrontEndController@about')->name('website.about');
Route::get('/category/{slug}','FrontEndController@category')->name('website.category');
Route::get('/tag/{slug}', 'FrontEndController@tag')->name('website.tag');
Route::get('/post/{slug}', 'FrontEndController@post')->name('website.post');


Route::post('/Contact', 'FrontEndController@send_message')->name('website.contact');


// Admin Route

Route::get('/category_create', 'CategoryController@create')->name('category_create');

Route::resource('category', 'CategoryController');
Route::resource('tags', 'TagController');
Route::resource('posts', 'PostController');
Route::resource('users', 'UserController');
Route::resource('setting', 'SettingController');


    Route::get('/dashboard','DashboardController@index')->name('dashboard');
    Route::get('/profile', 'UserController@profile')->name('user.profile');
    Route::post('/profile', 'UserController@profile_update')->name('user.profile.update');
    


    // Contact message
    Route::get('/contact', 'ContactController@index')->name('contact.index');
    Route::get('/contact/show/{id}', 'ContactController@show')->name('contact.show');
    Route::delete('/contact/delete/{id}', 'ContactController@destroy')->name('contact.destroy');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
