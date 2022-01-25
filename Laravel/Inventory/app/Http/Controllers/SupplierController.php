<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Supplier;
use DB;
use Image;
use File;

class SupplierController extends Controller
{
    public function index()
    {
        return view('admin/supplier/add_supplier');
 
    }
 
    public function insert_supplier(Request $request){
 
                                             
 
     $Supplier = new Supplier;
     $Supplier->name = $request->name;
     $Supplier->email = $request->email;
     $Supplier->phone = $request->phone;
     $Supplier->address = $request->address;
     $Supplier->shopname = $request->shopname;
     $Supplier->account_number = $request->account_number;
     $Supplier->bank_name = $request->bank_name;
     $Supplier->bank_branch = $request->bank_branch;
     $Supplier->account_holder = $request->account_holder;
     $Supplier->type = $request->type;
     $Supplier->city = $request->city;
 
     
 
     if ($request->image) {
    
       $image = $request->file('image');
     // $img = time() . '.'. $image->getClientOriginalExtension();
      $img = time() . '.'. $image->getClientOriginalExtension();
      $location = public_path('/admin/Suppliers/'.$img);
   //    $location = public_path('images/'.$img);
 
       Image::make($image)->save($location)->resize(300, 200);
        $Supplier->image = $img;
 
   }
 
     $Supplier->save();
    return redirect('/show_Supplier')->with('sucess', 'A new Supplier added  successfully '); 
 
 
 
    }
 
 
 
    public function show_Supplier(){
 
     //$categoris = brand::paginate(8);
    $Suppliers = Supplier::orderBy('id','desc')->paginate(6);
      return view('admin\Supplier\manage_Supplier',['Suppliers'=> $Suppliers]);
 
  }
 
 
  public function Supplier_delete($id)
  {
 
    $Supplier = Supplier::find($id);
 
 
    // Delete image from PC 
  $location = public_path('/admin/Suppliers/'.$Supplier->image);
  unlink($location);
 
   $Supplier->delete();
   return back()->with('sucess', 'Supplier Delete Successfully!!');
 
   }
 
 
 
   public function Supplier_edit($id)
   {
     $Supplier = Supplier::find($id);
  
       // $product = DB::select('select * from products where id=$id');
        return view('admin\supplier\edit_supplier',['Supplier'=>$Supplier]);
   }
 
 
   
  public function Supplier_update(Request $request, $id){
 
   
 
     $Supplier = Supplier::find($id);
     $Supplier->name = $request->name;
     $Supplier->email = $request->email;
     $Supplier->phone = $request->phone;
     $Supplier->address = $request->address;
     $Supplier->shopname = $request->shopname;
     $Supplier->account_number = $request->account_number;
     $Supplier->bank_name = $request->bank_name;
     $Supplier->bank_branch = $request->bank_branch;
     $Supplier->account_holder = $request->account_holder;
     $Supplier->type = $request->type;
     $Supplier->city = $request->city;

 
   
     $location = public_path('/admin/Suppliers/'.$request->Supplier_image);
     unlink($location);
   
     if ($request->image) {
    
       $image = $request->file('image');
     // $img = time() . '.'. $image->getClientOriginalExtension();
      $img = time() . '.'. $image->getClientOriginalExtension();
      $location = public_path('/admin/Suppliers/'.$img);
   //    $location = public_path('images/'.$img);
   
       Image::make($image)->save($location)->resize(300, 200);
        $Supplier->image = $img;
   }
   
     $Supplier->save();
   
      return redirect('/show_Supplier')->with('sucess', 'Supplier Update  successfully '); 
   
    }
}
