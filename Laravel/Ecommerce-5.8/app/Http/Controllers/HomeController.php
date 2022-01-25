<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        
            $orders = DB::table('customars')
                   ->join('customar_orders', 'customars.id', '=', 'customar_orders.customar_id')
                   ->select('customars.id','customars.first_name','customars.last_name', 'customar_orders.total_price', 'customar_orders.created_at', 'customar_orders.payment_type', 'customar_orders.payment_status', 'customar_orders.order_status')
                   ->get();
                  
           
      
        return view('admin.dashboard.dashboard',['orders'=> $orders]);     
    }
}
