<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Customer;
use App\Order;
use App\Order_detail;
use App\Product;
use DB;


class OrderController extends Controller
{
    public function order_manager_view(){

       $orders = DB::table('orders')
               ->join('customers', 'orders.customer_id','customers.id')
               ->select('customers.id','customers.name','customers.image','orders.*')
               ->get();
               return view('admin\order\manage_order',['orders'=> $orders]);     
                  
       }
  
  
  
  
  
     public function order_details($id){


        $customar_order=DB::table('orders')
          ->join('customers','orders.customer_id','customers.id')
          ->select('customers.name','customers.email','customers.phone','customers.address','customers.image','orders.*')
          ->where('orders.id',$id)
          ->first();

          $order_details=DB::table('order_details')
         ->join('products','order_details.product_id','products.id')
         ->select('products.product_name','products.image','order_details.*')
         ->where('order_id',$id)
         ->get();

       return view('admin\order\order_details',['customar_order'=>$customar_order, 'order_details'=>$order_details,]);
  
       }
  
  
       public function aprove_order($id){

       // return $id;

        $aprove_order=DB::table('orders')->where('id',$id)->update(['order_status'=>'aprove']);

        if($aprove_order){
          return redirect('order/manage/view')->with('sucess','Order Approved ');
        }else{
          return redirect('/order/manage/view')->with('error','Order Not Approved');
        }
      
      }

      public function panding_orders(){

        $orders = DB::table('orders')
                ->join('customers', 'orders.customer_id','customers.id')
                ->select('customers.id','customers.name','customers.image','orders.*')
                ->where('order_status','pending')
                ->get();
                return view('admin\order\manage_order',['orders'=> $orders]);     
                   
        }


        public function aprove_orders(){

          $orders = DB::table('orders')
                  ->join('customers', 'orders.customer_id','customers.id')
                  ->select('customers.id','customers.name','customers.image','orders.*')
                  ->where('order_status','aprove')
                  ->get();
                  return view('admin\order\manage_order',['orders'=> $orders]);     
                     
          }

        



      



}
