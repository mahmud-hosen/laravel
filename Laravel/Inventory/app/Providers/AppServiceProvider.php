<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;


use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;

use App\Category;
use App\Order;
use App\Customer;
use App\Employees;
use App\Supplier;
use App\Order_detail;
use App\Product;
use DB;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        //



        View::composer('*', function ($view) {
            View::share('all_categories', Category::where('publication_status',1)->get());

            }); 

            //--------------------- Count--------------------------

       View::share('pending_orders_count',Order::where('order_status','pending')->count('order_status'));
       View::share('aprove_orders_count',Order::where('order_status','aprove')->count('order_status'));

       View::share('customer_count',Customer::count('id'));


       View::share('employees_count',Employees::count('id'));


       View::share('supplier_count',Supplier::count('id'));



       View::share('total_category',Category::count('id'));
       View::share('parent_category',Category::where('parent_id',NULL)->count('id'));
       View::share('sub_category',Category::count('parent_id'));

       View::share('product_count',Product::count('id'));
       View::share('public_product',Product::where('publication_status',1)->count('id'));
       View::share('unpublic_product',Product::where('publication_status',0)->count('id'));


       $date = date("d/m/y");
       $year = date("y");

       View::share('today_total_exp', DB::table('expenses')->where('date',$date)->sum('amount'));
       View::share('yearly_total_exp', DB::table('expenses')->Where('date', 'like', '%'.'/'.'%'.'/'.$year)->sum('amount'));
       View::share('total_exp', DB::table('expenses')->sum('amount'));


       $today_date = date("d-m-y");
       View::share('today_sales', DB::table('orders')->where('order_date',$today_date)->sum('total'));
       View::share('yearly_sales',DB::table('orders')->Where('order_date', 'like', '%'.'-'.'%'.'-'.$year)->sum('total') );
       View::share('total_sales', DB::table('orders')->sum('total'));













    }
}
