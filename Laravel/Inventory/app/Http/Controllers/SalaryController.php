<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\advance_salary;
use DB;
use Image;
use File;

class SalaryController extends Controller
{
    public function index()
    {
        return view('admin/salary/add_advance_salary');
    }

    public function insert_advance_salary(Request $request)
    {

        $emp_id = $request->emp_id;
        $month = $request->month;

                    
      $advanced = DB::table('advance_salaries')
      ->where('month', $month)
      ->where('emp_id', $emp_id)
      ->get();

       // return  $advanced;  
       if($advanced->isEmpty()){
        $adv_salary = new advance_salary;
        $adv_salary->emp_id = $request->emp_id;
        $adv_salary->month = $request->month;
        $adv_salary->year = $request->year;
        $adv_salary->advance_sarary = $request->advance_sarary;
        $adv_salary->save();
        return redirect('add_advance_salary')->with('sucess', 'Sucessfully Paid Advance  Salary');
    
    }else{
        return redirect('add_advance_salary')->with('error', 'Allread Paid Advance  Saraly'); 

       }
 
    }


    public function show_advance_salary(){

        $adv_salary = DB::table('advance_salaries')
               ->join('employees', 'advance_salaries.emp_id', '=', 'employees.id')
               ->select('advance_salaries.*','employees.name','employees.salary','employees.image',)
               ->get();
               return view('admin\salary\manage_advance_salary',['adv_salary'=> $adv_salary]);     
       }


       public function pay_salary(){

        $employes = DB::table('employees')->get();
               return view('admin\salary\pay_salary',['employes'=> $employes]);   


       }



    
}
