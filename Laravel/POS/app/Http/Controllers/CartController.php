<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Cart;
use Session;
use App\Customer;


class CartController extends Controller
{
    public function add_cart(Request $request){


       
       // return $request;

       $data=array();
       $data['id']=$request->id;
       $data['name']=$request->name;
       $data['price']=$request->price;
       $data['quantity']=$request->quantity;

       $add=Cart::add($data);

       if($add){
        return back()->with('sucess', 'Cart Product added Successfully!!');

       }else{
        return back()->with('error', ' Product not  added at the Cart !!');

       }


    }


    public function cart_item_remove($id){
      $remove= Cart::remove($id);

        if($remove){
          return back()->with('sucess', 'Product remove Successfully!!');
  
         }else{
          return back()->with('error', ' Product not remove from the Cart !!');
  
         }
    }

    public function cart_item_update(Request $request,$id){
    
     $update= Cart::update($id, array(
        'quantity' => array(
            'relative' => false,
            'value' => $request->quantity,
        ),
      ));


      if($update){
        return back()->with('sucess', 'Product update Successfully!!');

       }else{
        return back()->with('error', ' Product not update from the Cart !!');

       } 
    }

    public function create_invoice(Request $request){

      if(Cart::isEmpty()){
        return Redirect('pos')->with('error', ' No products added in the cart !!');


      }else{
        
      $contents = Cart::getContent();
      $c_id = $request->customer_id;
      $customar = Customer::where('id',$c_id)->first();

     return view('admin.pos.order_invoice',compact('contents','customar'));


      }


    }


    public function final_invoice(Request $request){

    // return $request->total;

      // return $request->pay;


     

      if($request->total==$request->due+$request->pay){

        $data=array();
        $data['customer_id']=$request->customer_id;
        $data['order_date']=$request->order_date;
        $data['order_status']=$request->order_status;
        $data['totall_products']=$request->totall_products;
        $data['sub_totall']=$request->sub_totall;
        $data['vat']=$request->vat;
        $data['total']=$request->total;
        $data['payment_status']=$request->payment_status;
        $data['pay']=$request->pay;
        $data['due']=$request->due;
   
        $order_id=DB::table('orders')->insertGetId($data);
   
        $contents = Cart::getContent();
   
        $order_data=array();
        foreach ($contents as $content ){
         $order_data['order_id']=$order_id;
         $order_data['product_id']=$content->id;
         $order_data['quantity']=$content->quantity;
         $order_data['unitcost']=$content->price;
         $order_data['total']=$content->price*$content->quantity;
   
         $insert=DB::table('order_details')->insert($order_data);
   
        }
   
        if($insert){
            Cart::clear();
         return Redirect('pos')->with('sucess', ' Successfully Invoice Created . Please Delever the Products . !!');
   
   
        }else{
         return Redirect()->with('error', ' Invoice  not Created  !!');
   
        }
        
      }else{
        return Redirect('pos')->with('error', ' Payment & Due Not Equal !!');
      }

      



    }



    
    


    
}
