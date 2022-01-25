<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Product;

class ProductsController extends Controller
{

    public function index()
    {
        $products = Product::orderBy('id','desc')->paginate(8);

       // $products = DB::select('select * from products');
        return view('frontend.pages.product.index',['products'=>$products]);
  
    }



    public function show($slug)
    {
        
        $product = Product::where('slug', $slug)->first();
        if (!is_null($product)){
            
            return view('frontend.pages.product.show', compact('product'));

        }
        else{
            session()->flash('errors','Sorry !!! There is no product by this URL .');
            return redirect()->route('products');
        }
        
    }
    





}
