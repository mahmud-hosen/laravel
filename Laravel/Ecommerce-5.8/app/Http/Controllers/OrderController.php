<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Customar;
use App\Customar_order;
use App\Order_detail;
use App\Product;
use App\Ship;
use DB;




class OrderController extends Controller
{
    
    public function order_manager_view(){

      $orders = DB::table('customars')
             ->join('customar_orders', 'customars.id', '=', 'customar_orders.customar_id')
             ->select('customars.id','customars.first_name','customars.last_name', 'customar_orders.total_price', 'customar_orders.created_at', 'customar_orders.payment_type', 'customar_orders.payment_status', 'customar_orders.order_status')
             ->get();
             return view('admin\order\manage_order',['orders'=> $orders]);     
     }





     public function order_details($id){

       $customar_order = Customar_order::where('customar_id',$id)->first();
       $p_id = $customar_order->id;
       $customar = Customar::where('id',$id)->first();
      $shipping_info = Ship::find($customar_order->shipping_id);

      $product_info = DB::table('order_details')
             ->join('products', 'order_details.product_id', '=', 'products.id')
             ->select('products.id','products.product_name','products.product_price','products.image','order_details.product_quantity')
             ->where('order_details.order_id', $p_id)
             ->get();

     return view('admin\order\order_details',['customar_order'=>$customar_order, 'customar'=>$customar, 'shipping_info'=>$shipping_info, 'product_info'=>$product_info]);

     }


     public function order_invoice_view($id){

      $customar_order = Customar_order::where('customar_id',$id)->first();
      $p_id = $customar_order->id;
      $customar = Customar::where('id',$id)->first();
     $shipping_info = Ship::find($customar_order->shipping_id);

     $product_info = DB::table('order_details')
            ->join('products', 'order_details.product_id', '=', 'products.id')
            ->select('products.id','products.product_name','products.product_price','products.image','products.product_short_description','order_details.product_quantity')
            ->where('order_details.order_id', $p_id)
            ->get();

    return view('admin\order\order_invoice',['customar_order'=>$customar_order, 'customar'=>$customar, 'shipping_info'=>$shipping_info, 'product_info'=>$product_info]);

    
    }


     

     
}
