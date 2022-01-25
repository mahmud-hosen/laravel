<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customar;
use App\Ship;
use App\Cart;





use App\Customar_order;
use App\Order_detail;


use Session;
use DB;
use Mail;
use App\Mail\SentCustomer;


class CheckoutController extends Controller
{

    

    public function customar_form(){

        return view('frontend\checkout\checkout_form');
        
    }

    
    public function customar_signup(Request $r){
      

      $r->validate([
      
        'first_name'       => 'required',
        'last_name'       => 'required',
        'email_address'       => 'required|unique:customars,email_address',
        'phone_number'       => 'required',
        'password'       => 'required',
        'address'       => 'required',
        
        
    ]);

      $customar = new Customar;
      $customar->first_name = $r->first_name;
      $customar->last_name = $r->last_name;
      $customar->email_address = $r->email_address;
      $customar->phone_number = $r->phone_number;
      $customar->password =bcrypt($r->password);
      $customar->address = $r->address;
      $customar->save();  


      // Customer Id pass to  public function shipping_form() 
            Session::put(['customar_id'=>$customar->id]);
      
         // For Mail 

      $inputs = [

        'first_name'=>$r->input('first_name'),
        'last_name'=>$r->input('last_name'),
        'email_address'=>$r->input('email_address'),
        'phone_number'=>$r->input('phone_number'),
        'password'=>$r->input('password'),
        'address'=>$r->input('address')
     ]; 
  
    //  Mail::send('frontend.mail.contact',$inputs,function($mail) use ($inputs) {
    //     $mail->from($inputs['email_address'], $inputs['first_name'])
    //     ->to('mahmmudhossain5824@gmail.com','mahmud')
    //     ->subject("Learn24bd");  
    //  });

     
   session()->flash('success',' Your email address is invalid');

     return redirect('/checkout/shipping');
       
    }


    public function shipping_form(){

        $reg_customar =  Customar::find(Session::get('customar_id'));
        return view('frontend.checkout.shipping_form',['reg_customar'=>$reg_customar]);
        
    }



    
    public function shipping_save(Request $request){

     // return $request;

         $ship = new Ship;
         $ship->full_name = $request->full_name;
         $ship->email_address = $request->email_address;
         $ship->phone_number = $request->phone_number;
         $ship->address = $request->address;
         $ship->save();  


          Session::put(['shipping_id'=>$ship->id]);

          return redirect('/checkout/payment');

      }


      
    public function payment_form_view(){


      return view('frontend\checkout\payment_form');

      

    // return  $reg_customar =  Ship::find(Session::get('shipping_id'));
     // return view('frontend.checkout.shipping_form',['reg_customar'=>$reg_customar]);
      
  }


  public function order_info_save(Request $request){

    //return  $request->payment_type;
    if($request->payment_type == 'Cash')
    {


         $ustomar_order = new Customar_order();
         $ustomar_order->customar_id = Session::get('customar_id');
         $ustomar_order->shipping_id = Session::get('shipping_id');
         $ustomar_order->total_price = Session::get('totall_price');  
         $ustomar_order->payment_type = $request->payment_type;
         $ustomar_order->save(); 

          


          $cartContents = Cart::orderBy('id','desc')->get();

          foreach ($cartContents as $cartContent){

            $order_detail = new Order_detail();
            $order_detail->order_id = $ustomar_order->id;
            $order_detail->product_id = $cartContent->product_id; 
            $order_detail->user_id = $cartContent->user_id; 
            $order_detail->ip_address = $cartContent->ip_address; 
            $order_detail->product_quantity = $cartContent->product_quantity;
            $order_detail->save();


          }

          DB::table('carts')->delete();

          return redirect('/');



          

       // id	order_id	product_id	product_name product_image	product_price	product_quantity


    }
    elseif ($request->payment_type == 'Paypal')
    {
      return 'I am paypal';

    }
    elseif($request->payment_type == 'Bkash')
    {
      return 'I am bkash';

    }



  }



  


  


      



    




}