<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employees;
use App\Attendence;

use DB;

class AttendenceController extends Controller
{
    public function take_attendence(){

        $employees= DB::table('employees')->get();
        return view('admin.attendence.take_attendence',['employees'=>$employees]);

    }

    public function attendence_save(request $request){

        foreach ($request->user_id as $id){
            $data[]=[
                "user_id"=>$id,
                "attendence"=>$request->attendence[$id],
                "att_date"=>$request->att_date,
                "att_year"=>$request->att_year,
                "edit_date"=>date("d_m_y")   
         ];
        }


      $date=$request->att_date;            
      $emp_atd = DB::table('attendences')->where('att_date',$date)->get();

       // return  $advanced;  
       if($emp_atd->isEmpty()){

        DB::table('attendences')->insert($data);
        return redirect('/take_attendence')->with('sucess', 'Attendence Save  successfully '); 

    }else{
        return redirect('/take_attendence')->with('error', 'Today Attendence Allready Taken'); 

       }

    }

    public function all_attendence(){

        $all_attendence= DB::table('attendences')->select('edit_date')->groupBy('edit_date')->get();
        return view('admin.attendence.all_attendence',['all_attendence'=>$all_attendence]);

    }


    public function attendence_delete($edit_date)
    {

        DB::table('attendences')->where('edit_date', $edit_date)->delete();

      return back()->with('success', 'Attendence Delete Successfully!!');

     }


     public function attendence_view($edit_date){

        $attendence_view = DB::table('attendences')
               -> join('employees', 'attendences.user_id', '=', 'employees.id')
               ->select('attendences.*','employees.name','employees.name','employees.image',)
               ->where('edit_date',$edit_date)
               ->get();

         return view('admin.attendence.view_attendence',['attendence_view'=>$attendence_view],['edit_date'=>$edit_date]);
       

    }
    


    public function attendence_update(request $request){

      //  return $request;
        foreach ($request->id as $id){
           $data=[
                "attendence"=>$request->attendence[$id],
               
            

         ];

         //$category = Attendence::find($id);

           $attendence = Attendence::find(['att_date'=>$request->att_date,'id'=>$id])->first();
           $attendence->update($data);

        }

        return back()->with('sucess', 'Attendence Update  successfully '); 



        // <input type="hidden" name="att_date" value="{{$view->att_date}}">
        //         <input type="hidden" name="att_year" value="{{$view->att_year}}">

        // "att_date"=>$request->att_date,
        //        "att_year"=>$request->att_year,
        //         "edit_date"=>date("d_m_y"), 


        // $category = Category::find($id);
        // DB::table('attendences')->update($data);
        // return redirect('/take_attendence')->with('sucess', 'Attendence Update  successfully '); 
 

       }

    }
     