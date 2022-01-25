<?php

namespace App\Http\Controllers\Backend;
use Illuminate\Http\Request;
use DB;
use App\Http\Controllers\Controller;

use App\Models\Product;
use App\Models\ProductImage;
use Image;
use File;



class ProductsController extends Controller
{
    

    public function index()
    {
        $products = Product::orderBy('id','desc')->get();

        // $products = DB::select('select * from products');
         return view('backend.pages.product.index',['products'=>$products]);

    }
    

    //------------------------------------------Product Create-------------------------

    public function create()
    {
        return view('backend.pages.product.create');
    
    }


    //----------------------------------------Product Edit----------------------------

    public function edit($id)
    {
        $product = Product::find($id);

        // $product = DB::select('select * from products where id=$id');
         return view('backend.pages.product.edit',['product'=>$product]);
         
    
    }


//--------------------------------------------------Product Store-------------------------------


    public function store(Request $request)
    {
        // Validation check ------Start
        $request->validate([
            'title'       => 'required|max:255',
            'description'       => 'required',
            'price'       => 'required|numeric',
            'quantity'       => 'required|numeric',

            'category_id'       => 'required',
            'brand_id'       => 'required',
            'admin_id'       => 'required',
            
            
        ]);

        // Validation check ------End

        $product = new Product();
        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->quantity = $request->quantity;

        $product->slug = $request->title;
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;
        $product->admin_id = $request->admin_id;
        $product->save(); 


        //ProductImage Model insert image
        
      
        
        if (count($request->product_image) > 0 ){
            foreach($request->product_image as $image){

                    //insert that image
                
              
                        $img = time() . '.'. $image->getClientOriginalExtension();
                        $location = public_path('images/products/'.$img);
                        Image::make($image)->save($location); 

                        $product_image = new ProductImage;
                        $product_image->product_id = $product->id;
                        $product_image->image = $img;
                       
                   
            }
        }
       
        
        $product_image->save();

        session()->flash('success','A new Product has added  successfully !!');
        return redirect()->route('admin.products');
    }



    //---------------------------------------------Product Update---------------------------------------


    public function update(Request $request, $id)
    {
        // Validation check ------Start
        $request->validate([
            'title'       => 'required|max:255',
            'description'       => 'required',
            'price'       => 'required|numeric',
            'quantity'       => 'required|numeric',

            'category_id'       => 'required',
            'brand_id'       => 'required',
            'admin_id'       => 'required',
            
            
        ]);

        // Validation check ------End

        $product = Product::find($id);
        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->quantity = $request->quantity;

        $product->slug = $request->title;
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;
        $product->admin_id = $request->admin_id;
        $product->save();
        return redirect()->route('admin.products');
    }





    
    //----------------------------------------Product Delete----------------------------

    


    public function delete($id)
    {
        $product = Product::find($id);

          if(!is_null($product)){

             // Delete Product image
             if (File::exists('images/products/'.$product->image)){
                 File::delete('images/products/'.$product->image);
            }
            $product->delete();

        }
       session()->flash('success','Product has deleted successfully !!');
       return back();  
    
    }

    

  


   



}



