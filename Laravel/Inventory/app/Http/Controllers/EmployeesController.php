<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Employees;
use DB;
use Image;
use File;

class EmployeesController extends Controller
{
   public function index()
   {
       return view('admin/employee/add_employee');
         
   }


   public function insert_employee(Request $request){

    
    $employees = new Employees;
    $employees->name = $request->name;
    $employees->email = $request->email;
    $employees->phone = $request->phone;
    $employees->address = $request->address;
    $employees->experience = $request->experience;
    $employees->salary = $request->salary;
    $employees->vacation = $request->vacation;
    $employees->city = $request->city;
    $employees->image = $request->image;
    

    if ($request->image) {
   
      $image = $request->file('image');
    // $img = time() . '.'. $image->getClientOriginalExtension();
     $img = time() . '.'. $image->getClientOriginalExtension();
     $location = public_path('/admin/employees/'.$img);
  //    $location = public_path('images/'.$img);

      Image::make($image)->save($location)->resize(300, 200);
       $employees->image = $img;

  }

    $employees->save();

   

   return redirect('/show_employee')->with('sucess', 'A new employee added  successfully '); 


   }

   


   public function show_employee(){

    //$categoris = brand::paginate(8);
   $all_employees = Employees::orderBy('id','desc')->paginate(6);
     return view('admin\employee\manage_employee',['all_employees'=> $all_employees]);

 }

 


 public function employee_edit($id)
 {
   $employee = Employees::find($id);

     // $product = DB::select('select * from products where id=$id');
      return view('admin\employee\edit_employee',['employee'=>$employee]);
      
      
 }

 

 
 public function employee_update(Request $request, $id){

  

  $employees = Employees::find($id);
  $employees->name = $request->name;
  $employees->email = $request->email;
  $employees->phone = $request->phone;
  $employees->address = $request->address;
  $employees->experience = $request->experience;
  $employees->salary = $request->salary;
  $employees->vacation = $request->vacation;
  $employees->city = $request->city;
  $employees->image = $request->image;
  

  $location = public_path('/admin/employees/'.$request->employee_image);
  unlink($location);

  if ($request->image) {
 
    $image = $request->file('image');
  // $img = time() . '.'. $image->getClientOriginalExtension();
   $img = time() . '.'. $image->getClientOriginalExtension();
   $location = public_path('/admin/employees/'.$img);
//    $location = public_path('images/'.$img);

    Image::make($image)->save($location)->resize(300, 200);
     $employees->image = $img;
}

  $employees->save();

   return redirect('/show_employee')->with('sucess', 'Employee Update  successfully '); 

 }



 public function employee_delete($id)
 {

   $employee = Employees::find($id);


   // Delete image from PC 
 $location = public_path('/admin/employees/'.$employee->image);
 unlink($location);

  $employee->delete();
  return back()->with('sucess', 'Employee Delete Successfully!!');

  }



}
