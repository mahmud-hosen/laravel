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


// -------------------------------------- Frontendcontroller ---------------------------------------


Route::get('/','Frontendcontroller@index')->name('index');

Auth::routes();

// -------------------------------------- HomeController --------------------------------------------

Route::get('/dashboard', 'HomeController@index')->name('home');




// --------------------------------------  CategoryController ----------------------------------------



Route::group(['middleware' => ['AuthCheck']], function () {

Route::get('/category/form','CategoryController@category_form')->name('category_form');
Route::post('/category/save','CategoryController@category_save')->name('category_save');
Route::get('/category/manage','CategoryController@manage_category')->name('manage_category');

Route::get('/category/unpublished/{id}','CategoryController@unpublished_category')->name('unpublished_category');
Route::get('/category/published/{id}','CategoryController@published_category')->name('published_category');

Route::get('/category/delete/{id}','CategoryController@category_delete')->name('category_delete');
Route::get('/category/edit/{id}','CategoryController@category_edit')->name('category_edit');
Route::post('/category/update/{id}','CategoryController@category_update')->name('category_update');



});


// --------------------------------------  BrandController ----------------------------------------



    Route::get('/brand/form','BrandController@brand_form')->name('brand_form');
    Route::post('/brand/save','BrandController@brand_save')->name('brand_save');
    Route::get('/manage/brand','BrandController@manage_brand')->name('manage_brand');

    Route::get('/brand/unpublished/{id}','BrandController@unpublished_brand')->name('unpublished_brand');
Route::get('/brand/published/{id}','BrandController@published_brand')->name('published_brand');

Route::get('/brand/delete/{id}','BrandController@brand_delete')->name('brand_delete');
Route::get('/brand/edit/{id}','BrandController@brand_edit')->name('brand_edit');
Route::post('/brand/update/{id}','BrandController@brand_update')->name('brand_update');



    






//---------------------------------------  ProductController ---------------------------------------------------

Route::get('/product/add','ProductController@product_form_show')->name('product_form');
Route::post('/product/add','ProductController@product_save')->name('product_save');
Route::get('/product/manage','ProductController@manage_product')->name('manage_product');

Route::get('/product/unpublished/{id}','ProductController@unpublished_product')->name('unpublished_product');
Route::get('/product/published/{id}','ProductController@published_product')->name('published_product');

Route::get('/product/delete/{id}','ProductController@product_delete')->name('product_delete');
Route::get('/product/edit/{id}','ProductController@product_edit')->name('product_edit');
Route::post('/product/update/{id}','ProductController@product_update')->name('product_update');



Route::get('/product/delete/','ProductController@delete_product_manage')->name('delete_product_manage');
Route::get('/restore/product/{id}','ProductController@restore_product')->name('restore_product');
Route::get('/force-delete/product/{id}','ProductController@force_delete_product')->name('force_delete_product');


//---------------------------------------  Frontendcontroller ---------------------------------------------------

Route::get('/product/details/{id}','Frontendcontroller@product_details')->name('product_details');
Route::get('/shop/view/','Frontendcontroller@shop_page_view')->name('shop_page_view');
Route::get('/category/product/{id}','Frontendcontroller@category_product')->name('category_product');


//--------------------------------------- Cart Controller ---------------------------------------------------

Route::get('/cart','Cartcontroller@index')->name('carts');
Route::post('/cart/add/product/{product_id}','CartController@add_to_cart')->name('add_to_cart');
Route::post('/cart/update/{product_id}','CartController@cart_update')->name('cart_update');
Route::get('/cart/delete/{product_id}','CartController@cart_delete')->name('cart_delete');



//--------------------------------------- Checkout Controller ---------------------------------------------------


Route::get('/customar','CheckoutController@customar_form')->name('customar_form')->middleware('CustomerLoginCheck'); 

Route::post('/customar/signup','CheckoutController@customar_signup')->name('customar_signup');



Route::group(['middleware' => ['CustomerNotLoginCheck']], function () {



Route::get('/checkout/shipping','CheckoutController@shipping_form')->name('shipping_form');

Route::post('/customar/shipping_info_save','CheckoutController@shipping_info_save')->name('shipping_info_save');

Route::post('/customar/shipping_save','CheckoutController@shipping_save')->name('shipping_save');

Route::get('/checkout/payment','CheckoutController@payment_form_view')->name('checkout_payment')->middleware('ShippingIdCheck');

Route::post('/checkout/new_order','CheckoutController@order_info_save')->name('order_save')->middleware('CartvalueCheck');   

Route::get('/checkout/payment/checkout_shipping','CheckoutController@checkout_shipping')->name('checkout_shipping');


});


//------------------------------------------------Order Controller-----------------------------------------------------------

Route::get('/order/manage/view','OrderController@order_manager_view')->name('order_manager');

Route::get('/order/details/{id}','OrderController@order_details')->name('order_details');

Route::get('/order/invoice/{id}','OrderController@order_invoice_view')->name('order_invoice');


//-------------------------------------------------------Login/Logout-------------------------------------------------------------------------

Route::get('/logout/customar','CustomerController@logout_customar')->name('logout_customar');
Route::post('/login/customar','CustomerController@login_customar')->name('login_customar');


//-------------------------------------------------------Product Comment------------------------------------------------------------------------

Route::post('/product/comment/{id}','CommentController@product_comment')->name('product_comment');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
