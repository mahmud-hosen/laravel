<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Cart;
use App\Customer;
use PDF;

class DocumentController extends Controller
{
    public function pdf($id){

    
        $contents = Cart::getContent();
       $customar = Customer::where('id',$id)->first();

    
    $pdf = PDF::loadView('admin.pos.invoice_download',compact('contents','customar'));  
           // $pdf->stream('download.pdf');
    return $pdf->download('invoice_download.pdf');









 






    }
}
