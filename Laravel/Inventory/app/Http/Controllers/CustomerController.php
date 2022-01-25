<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Customer;
use DB;
use Image;
use File;


class CustomerController extends Controller
{
    public function index()
   {
       return view('admin/customer/add_customer');

   }

   public function insert_customer(Request $request){

    										

    $customer = new Customer;
    $customer->name = $request->name;
    $customer->email = $request->email;
    $customer->phone = $request->phone;
    $customer->address = $request->address;
    $customer->shopname = $request->shopname;
    $customer->account_number = $request->account_number;
    $customer->bank_name = $request->bank_name;
    $customer->bank_branch = $request->bank_branch;
    $customer->account_holder = $request->account_holder;
    $customer->city = $request->city;

    

    if ($request->image) {
   
      $image = $request->file('image');
    // $img = time() . '.'. $image->getClientOriginalExtension();
     $img = time() . '.'. $image->getClientOriginalExtension();
     $location = public_path('/admin/customers/'.$img);
  //    $location = public_path('images/'.$img);

      Image::make($image)->save($location)->resize(300, 200);
       $customer->image = $img;

  }

    $customer->save();
   return redirect('/show_customer')->with('sucess', 'A new customer added  successfully '); 



   }



   public function show_customer(){

    //$categoris = brand::paginate(8);
   $customers = Customer::orderBy('id','desc')->paginate(6);
     return view('admin\customer\manage_customer',['customers'=> $customers]);

 }


 public function customer_delete($id)
 {

   $customer = Customer::find($id);


   // Delete image from PC 
 $location = public_path('/admin/customers/'.$customer->image);
 unlink($location);

  $customer->delete();
  return back()->with('sucess', 'Customer Delete Successfully!!');

  }



  public function customer_edit($id)
  {
    $customers = Customer::find($id);
 
      // $product = DB::select('select * from products where id=$id');
       return view('admin\customer\edit_customer',['customers'=>$customers]);

  }


  
 public function customer_update(Request $request, $id){

  

    $customer = Customer::find($id);
    $customer->name = $request->name;
    $customer->email = $request->email;
    $customer->phone = $request->phone;
    $customer->address = $request->address;
    $customer->shopname = $request->shopname;
    $customer->account_number = $request->account_number;
    $customer->bank_name = $request->bank_name;
    $customer->bank_branch = $request->bank_branch;
    $customer->account_holder = $request->account_holder;
    $customer->city = $request->city;

    
  
    $location = public_path('/admin/customers/'.$request->customers_image);
    unlink($location);
  
    if ($request->image) {
   
      $image = $request->file('image');
    // $img = time() . '.'. $image->getClientOriginalExtension();
     $img = time() . '.'. $image->getClientOriginalExtension();
     $location = public_path('/admin/customers/'.$img);
  //    $location = public_path('images/'.$img);
  
      Image::make($image)->save($location)->resize(300, 200);
       $customer->image = $img;
  }
  
    $customer->save();
  
     return redirect('/show_customer')->with('sucess', 'Customer Update  successfully '); 
  
   }


}
