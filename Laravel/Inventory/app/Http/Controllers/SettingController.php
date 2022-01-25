<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;
use DB;
use Image;
use File;

class SettingController extends Controller
{
    public function index()
    {
        return view('admin/setting/project_info_add');
 
    }
 
    public function insert_info(Request $request){

        $view_info= DB::table('settings')->first();

        if($view_info == ''){

                                       
     $Setting = new Setting;
     $Setting->company_name = $request->company_name;
     $Setting->company_address = $request->company_address;
     $Setting->company_email = $request->company_email;
     $Setting->company_mobile = $request->company_mobile;
     $Setting->company_city = $request->company_city;
     $Setting->company_country = $request->company_country;
     $Setting->company_zipcode = $request->company_zipcode;

     if ($request->image) {
    
       $image = $request->file('image');
     // $img = time() . '.'. $image->getClientOriginalExtension();
      $img = time() . '.'. $image->getClientOriginalExtension();
      $location = public_path('/admin/company/'.$img);
   //    $location = public_path('images/'.$img);
       Image::make($image)->save($location)->resize(300, 200);
        $Setting->image = $img;
 
   }
 
     $Setting->save();
    return redirect('view_info')->with('sucess', 'Company Info added  successfully '); 

      
      }else{
        return redirect('view_info')->with('error', 'Already  added Company Info '); 
    }

	 
 
 
 
    }
 
 
 
    public function view_info(){

        $view_info= DB::table('settings')->first();

      if($view_info == ''){
        return redirect('company_info_add')->with('error', 'Please Insert Company Info');
    
    }else{
        return view('admin\setting\view_info',['view_info'=> $view_info]);
       }
 
  }


  
  public function edit_info()
  {
      $view_info= DB::table('settings')->first();

         if($view_info == ''){
            return redirect('company_info_add')->with('error', 'Please Insert Company Info');
        
        }else{
            return view('admin\setting\edit_info',['view_info'=> $view_info]);
        }


  }
 
 
  public function delete_info($id)
  {
 
   $Setting = Setting::find($id);
 
    // Delete image from PC 
  $location = public_path('/admin/company/'.$Setting->image);
  unlink($location);

   $Setting->delete();

   return redirect('company_info_add')->with('sucess', 'Company Info Delete Successfully!!');

   
 
   }
 

   
  public function info_update(Request $request, $id){
 

     $Setting = Setting::find($id);
     $Setting->company_name = $request->company_name;
     $Setting->company_address = $request->company_address;
     $Setting->company_email = $request->company_email;
     $Setting->company_mobile = $request->company_mobile;
     $Setting->company_city = $request->company_city;
     $Setting->company_country = $request->company_country;
     $Setting->company_zipcode = $request->company_zipcode;

   
     $location = public_path('/admin/company/'.$Setting->image);
     unlink($location);

     if ($request->image) {
    
        $image = $request->file('image');
      // $img = time() . '.'. $image->getClientOriginalExtension();
       $img = time() . '.'. $image->getClientOriginalExtension();
       $location = public_path('/admin/company/'.$img);
    //    $location = public_path('images/'.$img);
  
        Image::make($image)->save($location)->resize(300, 200);
         $Setting->image = $img;
  
    }
  
      $Setting->save();
     return redirect('view_info')->with('sucess', 'Company Info Update  successfully '); 

    }
}