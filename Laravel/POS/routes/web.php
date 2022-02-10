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



//------------------------------------------------dashboard Controller-----------------------------------------------------------

Route::get('/dashboard','DashboardController@dashboard')->name('dashboard');




//-------------------------------------Employees Route--------------------------------------

Route::get('/add-employee', 'EmployeesController@index')->name('add.employee');
Route::post('/insert_employee', 'EmployeesController@insert_employee')->name('insert_employee');
Route::get('/show_employee', 'EmployeesController@show_employee')->name('show_employee');
Route::get('/employee_edit/{id}', 'EmployeesController@employee_edit')->name('employee_edit');
Route::post('/employee_update/{id}', 'EmployeesController@employee_update')->name('employee_update');
Route::get('/employee_delete/{id}', 'EmployeesController@employee_delete')->name('employee_delete');


//-------------------------------------Customar Route--------------------------------------

Route::get('/add_customer', 'CustomerController@index')->name('add_customer');
Route::post('/insert_customer', 'CustomerController@insert_customer')->name('insert_customer');
Route::get('/show_customer', 'CustomerController@show_customer')->name('show_customer');

Route::get('/customer_edit/{id}', 'CustomerController@customer_edit')->name('customer_edit');
Route::post('/customer_update/{id}', 'CustomerController@customer_update')->name('customer_update');
Route::get('/customer_delete/{id}', 'CustomerController@customer_delete')->name('customer_delete');


//-------------------------------------Suppliers Route--------------------------------------

Route::get('/add_supplier', 'SupplierController@index')->name('add_supplier');
Route::post('/insert_supplier', 'SupplierController@insert_supplier')->name('insert_supplier');
Route::get('/show_Supplier', 'SupplierController@show_Supplier')->name('show_Supplier');
Route::get('/Supplier_edit/{id}', 'SupplierController@Supplier_edit')->name('Supplier_edit');
Route::post('/Supplier_update/{id}', 'SupplierController@Supplier_update')->name('Supplier_update');
Route::get('/Supplier_delete/{id}', 'SupplierController@Supplier_delete')->name('Supplier_delete');

//-------------------------------------Salary Route--------------------------------------

Route::get('/add_advance_salary', 'SalaryController@index')->name('add_advance_salary');
Route::post('/insert_advance_salary', 'SalaryController@insert_advance_salary')->name('insert_advance_salary');
Route::get('/show_advance_salary', 'SalaryController@show_advance_salary')->name('show_advance_salary');
Route::get('/pay_salary', 'SalaryController@pay_salary')->name('pay_salary');



// Route::get('/salary_edit/{id}', 'SalaryController@salary_edit')->name('salary_edit');
// Route::post('/salary_update/{id}', 'SalaryController@salary_update')->name('salary_update');
// Route::get('/salary_delete/{id}', 'SalaryController@salary_delete')->name('salary_delete');






// --------------------------------------  CategoryController ----------------------------------------




    Route::get('/category/form','CategoryController@category_form')->name('category_form');
    Route::post('/category/save','CategoryController@category_save')->name('category_save');
    Route::get('/category/manage','CategoryController@manage_category')->name('manage_category');
    
    Route::get('/category/unpublished/{id}','CategoryController@unpublished_category')->name('unpublished_category');
    Route::get('/category/published/{id}','CategoryController@published_category')->name('published_category');
    
    Route::get('/category/delete/{id}','CategoryController@category_delete')->name('category_delete');
    Route::get('/category/edit/{id}','CategoryController@category_edit')->name('category_edit');
    Route::post('/category/update/{id}','CategoryController@category_update')->name('category_update');
    
    
    

    //---------------------------------------  ProductController ---------------------------------------------------

Route::get('/product/add','ProductController@product_form_show')->name('product_form');
 Route::post('/product/add','ProductController@product_save')->name('product_save');
 Route::get('/product/manage','ProductController@manage_product')->name('manage_product');

 Route::get('/product/unpublished/{id}','ProductController@unpublished_product')->name('unpublished_product');
 Route::get('/product/published/{id}','ProductController@published_product')->name('published_product');

 Route::get('/product/delete/{id}','ProductController@product_delete')->name('product_delete');
 Route::get('/product/edit/{id}','ProductController@product_edit')->name('product_edit');
 Route::post('/product/update/{id}','ProductController@product_update')->name('product_update');

         // Excel & Export Product Route

    Route::get('/import_product','ProductController@import_product')->name('import_product');
    Route::get('/export','ProductController@export')->name('export');
    Route::post('/import','ProductController@import')->name('import');


    


    

    //---------------------------------------  ExpenseController ---------------------------------------------------

    Route::get('/expense_form','ExpenseController@expense_form')->name('expense_form');
    Route::post('/expense_save','ExpenseController@expense_save')->name('expense_save');
    Route::get('/today_expense','ExpenseController@today_expense')->name('today_expense');
    Route::get('/expense_edit/{id}','ExpenseController@expense_edit')->name('expense_edit');
    Route::post('/expense_update/{id}','ExpenseController@expense_update')->name('expense_update');

        //---------  Yearly Expence -------------

        Route::get('/month_expense/{month}','ExpenseController@month_expense')->name('month_expense');
        Route::get('/year_expense','ExpenseController@year_expense')->name('year_expense');



//---------------------------------------  ExpenseController ---------------------------------------------------


        Route::get('/take_attendence','AttendenceController@take_attendence')->name('take_attendence');
        Route::post('/attendence_save','AttendenceController@attendence_save')->name('attendence_save');
        Route::get('/all_attendence','AttendenceController@all_attendence')->name('all_attendence');
        Route::get('/attendence_delete/{edit_date}','AttendenceController@attendence_delete')->name('attendence_delete');
        Route::get('/attendence_view/{date}','AttendenceController@attendence_view')->name('attendence_view');

        Route::post('/attendence_update','AttendenceController@attendence_update')->name('attendence_update');



        
//-------------------------------------Settings Route--------------------------------------

Route::get('/company_info_add', 'SettingController@index')->name('company_info_add');

 Route::post('/insert_info', 'SettingController@insert_info')->name('insert_info');
 Route::get('/view_info', 'SettingController@view_info')->name('view_info');
 Route::get('/edit_info', 'SettingController@edit_info')->name('edit_info');

Route::post('/info_update/{id}', 'SettingController@info_update')->name('info_update');
 Route::get('/delete_info/{id}', 'SettingController@delete_info')->name('delete_info');



 //-------------------------------------pos Route--------------------------------------

 Route::get('/pos', 'PosController@index')->name('pos');


  //-------------------------------------Cart Route--------------------------------------

  Route::post('/add_cart', 'CartController@add_cart')->name('add_cart');
  Route::get('/cart_item_remove/{id}', 'CartController@cart_item_remove')->name('cart_item_remove');
  Route::post('/cart_item_update/{id}', 'CartController@cart_item_update')->name('cart_item_update');

  Route::post('/create_invoice', 'CartController@create_invoice')->name('create_invoice');
  Route::post('/final_invoice', 'CartController@final_invoice')->name('final_invoice');


  


  //-------------------------------------pdf Route--------------------------------------

  Route::get('/pdf/{id}', 'DocumentController@pdf')->name('pdf');


//------------------------------------------------Order Controller-----------------------------------------------------------

Route::get('/order/manage/view','OrderController@order_manager_view')->name('order_manager');

Route::get('/order/details/{id}','OrderController@order_details')->name('order_details');

Route::get('/order/invoice/{id}','OrderController@order_invoice_view')->name('order_invoice');

Route::get('/aprove_order/{id}','OrderController@aprove_order')->name('aprove_order');

Route::get('/panding_orders','OrderController@panding_orders')->name('panding_orders');
Route::get('/aprove_orders','OrderController@aprove_orders')->name('aprove_orders');



//------------------------------------------------Sales Controller-----------------------------------------------------------

Route::get('/today_sales','SalesController@today_sales')->name('today_sales');

Route::get('/month_sales/{month}','SalesController@month_sales')->name('month_sales');

Route::get('/yearly_sales','SalesController@yearly_sales')->name('yearly_sales');













  

  

  






        


        

        
        
        

        
        

       
   
 















Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
