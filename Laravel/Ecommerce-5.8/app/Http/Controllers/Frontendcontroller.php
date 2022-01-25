<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Comment;





class Frontendcontroller extends Controller
{
    function index(){

        $latest_products = Product::orderBy('id','desc')->where('publication_status',1)->take(7)->get();
        $all_products = Product::where('publication_status',1)->get();
        
      //  $all_categories = Category::where('publication_status',1)->get();    <---It is use D:\Ecommerce-5.8\app\Providers\AppServiceProvider.php

        return view('frontend.index_content',['latest_products'=>$latest_products,'all_products'=>$all_products]);

    }


    public function product_details($id){


        $product_Comment = Comment::where('post_id',$id)->get();

         $product_details = Product::find($id);
         $related_products = Product::where('category_id',$product_details->category_id)->where('publication_status',1)->where('id','!=',$product_details->id)->get();

        // $product = DB::select('select * from products where id=$id');
         return view('frontend.product_details',['product_details'=>$product_details,'related_products'=>$related_products,'product_Comment'=>$product_Comment]);

    }

    public function shop_page_view(){

       // $count = DB::table('carts')->count();
       //  $count = Product::count($category_id);

       //  $all_categories = Category::where('publication_status',1)->get();    <---It is use D:\Ecommerce-5.8\app\Providers\AppServiceProvider.php

        $all_products = Product::where('publication_status',1)->paginate(6);
        return view('frontend.shop_page',['all_products'=>$all_products]);
    }


    
    public function category_product($id){

        
        //  $all_categories = Category::where('publication_status',1)->get();    <---It is use D:\Ecommerce-5.8\app\Providers\AppServiceProvider.php

        $category_products = Product::where('publication_status',1)->where('category_id',$id)->paginate(6);
        return view('frontend.shop_page',['all_products'=>$category_products]);

    }







   
}

