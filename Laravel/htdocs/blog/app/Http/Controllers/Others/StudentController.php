<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Student;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class StudentController extends Controller
{


    public function student(){
        $users = DB::select('select* from student');
        
        return view('others.welcome',['users'=>$users]);
        }


    public function welcome1()
    {
  
       
        return view('others.welcome1');


    }




    
    public function save(Request $request)
    {
        
        $student = new Student;

        $student->name = $request->name;
        $student->age = $request->age;

        
        $student->save();
       
       // return  redirect()->route('welcome');
        return view('others.welcome1');


    }


   // public function index()
   // {

    //    $students = Student::all();
    //    return view('index')->with('students',$students);



   // }

  
}
