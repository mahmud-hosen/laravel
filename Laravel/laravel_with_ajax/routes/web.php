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



Route::get('/index','ContactController@index')->name('index');
Route::get('/allcontact','ContactController@allcontact')->name('allcontact');







//----------------------------------------------------------------------------------------


Route::get('/Contact','ContactController@Contact')->name('Contact');
Route::post('/postContact','ContactController@postContact');

//-------------------------Live Search Route------------------
Route::get('/live_search','ContactController@live_search')->name('live_search');
Route::post('/search_data_read','ContactController@search_data_read')->name('search_data_read');


Route::get('/data_insert_with_show','ContactController@data_insert_with_show')->name('data_insert_with_show');

Route::post('/save_data','ContactController@save_data');


//------------------------------------------- Laravel Ajax Jquery CURD ----------------------------------------



Route::get('admin/contacts', 'ContactController@getIndex');
Route::get('admin/contacts/data', 'ContactController@getData');
Route::post('admin/contacts/store', 'ContactController@postStore');
Route::post('admin/contacts/update', 'ContactController@postUpdate');
Route::post('admin/contacts/delete', 'ContactController@postDelete');





//--------------------------------------------

Route::resource('ajax-crud', 'AjaxCrudController');

Route::post('ajax-crud/update', 'AjaxCrudController@update')->name('ajax-crud.update');

Route::get('ajax-crud/destroy/{id}', 'AjaxCrudController@destroy');



//--------------------------------------------route for product ajax crud--------------------

Route::resource('ajaxproducts','ProductAjaxController');


//--------------------------------------------- Laravel Ajax CRUD Route Sucessfully work -----------------------------------

Route::resource('posts', 'PostController');










