<?php

use Illuminate\Support\Facades\Route;

/*
   Web Routes
*/

//Route::get('/index','StudentController@index')->name('index');
//Route::post('/save','StudentController@save')->name('save');
//Route::get('/welcome1','StudentController@welcome1')->name('welcome1');
//Route::get('img','ImageController@create')->name('create');
 //Route::post('/store','ImageController@store')->name('store');
 //Route::get('student','StudentController@index');
 //Route::get('view-records','StudViewController@index');

 Route::get('student','StudentController@student')->name('student');



 // Ecomerce Project Route Start :
 Route::get('/','Frontend\PagesController@index')->name('home');
 Route::get('/contact','Frontend\PagesController@contact')->name('contact');


 /*
   Product Routes
   All the routes for our product for frontend
 */

 Route::get('/products','Frontend\ProductsController@index')->name('index');
 Route::get('/product/{slug}','Frontend\ProductsController@show')->name('products.show');
 Route::get('/search','Frontend\PagesController@search')->name('search');

 // Category Route 

 Route::get('/products/category','Frontend\CategoriesController@index')->name('categories.index');

 Route::get('/products/category/{id}','Frontend\CategoriesController@show')->name('categories.show');



//Frontend
//Backend

 //Admin Route 





 // Product Route

 Route::get('/admin','Backend\PagesController@index')->name('admin.index');
 Route::get('/admin/products','Backend\ProductsController@index')->name('admin.products');
 Route::get('/admin/product/create','Backend\ProductsController@create')->name('admin.product.create');
 Route::post('/admin/product/store','Backend\ProductsController@store')->name('admin.product.store');
 Route::get('/admin/product/edit/{id}','Backend\ProductsController@edit')->name('admin.product.edit');
 Route::post('/admin/product/update/{id}','Backend\ProductsController@update')->name('admin.product.update');

 Route::post('/admin/product/delete/{id}','Backend\ProductsController@delete')->name('admin.products.delete');

 
 


 // Category Route

 Route::get('/admin/category','Backend\CategoriesController@index')->name('admin.categories');  
 Route::get('/admin/category/create','Backend\CategoriesController@create')->name('admin.category.create');
 Route::post('/admin/category/store','Backend\CategoriesController@store')->name('admin.category.store');
 Route::get('/admin/category/edit/{id}','Backend\CategoriesController@edit')->name('admin.category.edit');
 Route::post('/admin/category/update/{id}','Backend\CategoriesController@update')->name('admin.category.update');

 Route::post('/admin/category/delete/{id}','Backend\CategoriesController@delete')->name('admin.category.delete');

 



 
 // Brand Routes

 Route::get('/admin/brand','Backend\BrandsController@index')->name('admin.brands');  
 Route::get('/admin/brand/create','Backend\BrandsController@create')->name('admin.brand.create');
 Route::post('/admin/brand/store','Backend\BrandsController@store')->name('admin.brand.store');
 Route::get('/admin/brand/edit/{id}','Backend\BrandsController@edit')->name('admin.brand.edit');
 Route::post('/admin/brand/update/{id}','Backend\BrandsController@update')->name('admin.brand.update');

 Route::post('/admin/brand/delete/{id}','Backend\BrandsController@delete')->name('admin.brand.delete');

 
