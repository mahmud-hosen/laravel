<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

use App\Product;
use App\Category;
use App\Cart;
use App\Brand;

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

             
           //  Category table share to all page  2 way:   1)  use Illuminate\Support\Facades\View;   2) use App\Category;
           // Way:1

           //  View::share('all_categories', Category::where('publication_status',1)->get());

         
            // Way:2

             View::composer('*', function ($view) {
             View::share('all_categories', Category::where('publication_status',1)->get());
             View::share('all_brands', Brand::where('publication_status',1)->get());

             });  
             
              View::share('count', DB::table('carts')->sum('product_quantity'));

               // Cart Item View 
             View::share('cart_item', Cart::orderBy('id','desc')->get());


             //...............................Count Category.....................................................

              View::share('category_count',Category::where('parent_id',NUll)->count('category_name'));


              //...............................Count Category.....................................................

              View::share('product_count',Product::count('id'));

              //


              View::share('order_price_totall', DB::table('customar_orders')->sum('total_price'));

              View::share('totall_customar', DB::table('customar_orders')->count('id'));
              View::share('totall_product', DB::table('products')->count('id'));
              View::share('totall_categories', DB::table('categories')->count('id'));

              
             //View::share('count', DB::select("SELECT SUM(product_quantity) FROM carts"));


             //$product_qt = DB::select("SELECT product_quantity FROM carts WHERE product_id = $p_id");
           //  View::share('sum', DB::select("SELECT SUM(carts.product_quantity*products.product_price) FROM  carts, products WHERE carts.product_id = products.id"));

           //  DB::select("SELECT product_id FROM carts WHERE product_id = $p_id");


            // SELECT SUM(carts.product_quantity*products.product_price) FROM  carts, products WHERE carts.product_id = products.id
                 

            



            


    }
}
