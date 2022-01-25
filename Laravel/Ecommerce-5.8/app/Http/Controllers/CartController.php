<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

use DB;
use App\Cart;




class CartController extends Controller
{
    public function add_to_cart(Request $request, $product_id)
    {
    
        $cart = new Cart;
        $cart->product_id = $request->product_id;
        $cart->product_quantity = $request->product_quantity;
        $cart->ip_address = request()->ip();
   
        if (Auth::check()) {
         $cart->user_id = Auth::id();
   
      }else{
   
      }
   
        $cart->save();
   
        return back();
    }

    public function cart_update(Request $request, $product_id)
    {

      
      DB::select("UPDATE carts
      SET product_quantity=$request->product_quantity
      WHERE product_id=$product_id");

      return back();

    }


    
    public function cart_delete($product_id)
    {


        DB::select("DELETE FROM carts WHERE product_id =$product_id");

      return back();

     }




  


    

   

     }
