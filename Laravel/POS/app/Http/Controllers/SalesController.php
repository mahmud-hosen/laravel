<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class SalesController extends Controller
{
    public function today_sales(){

        $mth ="Today";

  $date = date("d-m-y");

$sales_details=DB::table('orders')
 ->join('customers','orders.customer_id','customers.id')
 ->select('customers.name','customers.image','orders.*')
 ->where('order_date',$date)
 ->get();

 $total_sales=DB::table('orders')->where('order_date',$date)->sum('total');
 return view('admin.sales.today_sales',['sales_details'=> $sales_details,'total_sales'=> $total_sales,'mth'=> $mth]);

        
    }



    public function month_sales($month){

        $mth ="Monthly";

          $sales_details=DB::table('orders')
        ->join('customers','orders.customer_id','customers.id')
        ->select('customers.name','customers.image','orders.*')
        ->Where('order_date', 'like', '%'.'-'.$month.'-'.'%')
        ->get();

       $total_sales=DB::table('orders')
        ->Where('order_date', 'like', '%'.'-'.$month.'-'.'%')
        ->sum('total');

        return view('admin.sales.today_sales',['sales_details'=> $sales_details,'total_sales'=> $total_sales,'mth'=> $mth]);

            }



            public function yearly_sales(){

                $mth ="Yearly";
                $year = date("y");

                  $sales_details=DB::table('orders')
                ->join('customers','orders.customer_id','customers.id')
                ->select('customers.name','customers.image','orders.*')
                ->Where('order_date', 'like', '%'.'-'.'%'.'-'.$year)
                ->get();
        
               $total_sales=DB::table('orders')
                ->Where('order_date', 'like', '%'.'-'.'%'.'-'.$year)
                ->sum('total');
        
                return view('admin.sales.today_sales',['sales_details'=> $sales_details,'total_sales'=> $total_sales,'mth'=> $mth]);
        
                    }


    

    




}