<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use App\Brand;
use PDF;
use Mail;





class BrandController extends Controller
{

    public function manage_brand(){

          $brands = Brand::orderBy('id','desc')->get();
        return view('manage_order',['brands'=> $brands]);
    }




  Public function brand_details($id){

    $details = Brand::where('id',$id)->get();
    return view('details',['details'=>$details]);


 }


 
 Public function brand_download($id){

    $details = Brand::where('id',$id)->get();
    //return view('download',['details'=>$details]);

    $pdf = PDF::loadView('download',['details'=>$details]);  
    return $pdf->download('medium.pdf');

 }


 public function customar_signup_view(){

  return view('checkout_form');


 }

 public function customar_signup(Request $request ){

// return $request;

 
 $inputs = [

  'first_name'=>$request->input('first_name'),
  'email_address'=>$request->input('email_address'),
  'phone_number'=>$request->input('phone_number'),
  
]; 

 Mail::send('contact',$inputs, function($mail) use ($inputs) 
 {
    $mail->to($inputs['email_address']);
    $mail->subject('Welcome');
    $mail->from('mahmudhossain582@gmail.com');
   
 });

return back();

 }



 public function qrcode(){

   return view('qr_code');

 }


 


 


    

   
}