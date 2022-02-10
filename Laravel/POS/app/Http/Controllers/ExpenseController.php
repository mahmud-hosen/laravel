<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Expense;
use DB;


class ExpenseController extends Controller
{
    public function expense_form()
    {
        return view('admin.expense.expense_add_form');
        
        
    }

    
   public function expense_save(Request $request)
    {

        $expense = new Expense;
        $expense->details = $request->details;
        $expense->amount = $request->amount;
        $expense->month = $request->month;
        $expense->date = $request->date;
        $expense->year = $request->year;

    
        $expense->save();

        return redirect('today_expense')->with('sucess', 'Expense added  successfully !!'); 
        
        
    }

    public function today_expense(){

                $mth ="Today";

        $date = date("d/m/y");
         $today=DB::table('expenses')->where('date',$date)->get();
         $total_exp=DB::table('expenses')->where('date',$date)->sum('amount');

        return view('admin.expense.today_expense',['today'=> $today,'total_exp'=> $total_exp,'mth'=> $mth]);


    }

    public function month_expense($month){

        

        $mth =$month;
       // $month = date("F");
         $month_details=DB::table('expenses')->where('month',$month)->get();
         $total_exp=DB::table('expenses')->where('month',$month)->sum('amount');
    
        return view('admin.expense.today_expense',['today'=> $month_details,'total_exp'=> $total_exp,'mth'=> $mth]);
    
    
    }

    

    public function year_expense(){

        $mth ="Yearly";
         $year = date("Y");
         $year_details=DB::table('expenses')->where('year',$year)->get();
         $total_exp=DB::table('expenses')->where('year',$year)->sum('amount');
    
        return view('admin.expense.today_expense',['today'=> $year_details,'total_exp'=> $total_exp,'mth'=> $mth]);
    
    
    }

    

    public function expense_edit($id)
    {
        $expense = Expense::find($id);

        // $product = DB::select('select * from products where id=$id');
         return view('admin.expense.expense_edit_form',['expense'=>$expense]);
          
    }

    
 public function expense_update(Request $request, $id){

  

    $expense = Expense::find($id);

         $expense->details = $request->details;
        $expense->amount = $request->amount;
        $expense->month = $request->month;
        $expense->date = $request->date;
        $expense->year = $request->year;

        $expense->save();

        return redirect('today_expense')->with('sucess', 'Expense Update  successfully !!'); 
  
   }

   



  

    




}
