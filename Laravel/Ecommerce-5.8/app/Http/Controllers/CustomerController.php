<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customar;
use Session;


class CustomerController extends Controller
{
    
  public function logout_customar(){

    session()->forget(['customar_id', 'shipping_id']);
    return redirect('/');


  }

  public function login_customar(Request $request){
     // return $request->email_address;

           // if $request->email_address and database email_address  match
    $customer = Customar::where('email_address',$request->email_address)->first();

           //if $customer  has matching email value
     if ($customer){

         if (password_verify ( $request->password , $customer->password )){

             Session::put(['customar_id'=>$customer->id]);
              Session::put(['customar_full_name'=>$customer->first_name.' '.$customer->last_name]);
             return redirect('/checkout/shipping');


         }else{
             
            session()->flash('error',' Your password is invalid');
            return redirect('/customar');


         }
        
    }else{
        session()->flash('error',' Your email address is invalid');
        return redirect('/customar');
    }





  }



  
}