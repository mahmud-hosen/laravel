<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Product;
use App\Category;
use Image;
use File;
use Session;




class ProductController extends Controller
{
    Public function product_form_show(){



       // $category = Category::orderBy('id','desc')->get();      if we use this quary must use--->  use App\Category;
       // $category = DB::table('categories')->get();             if we use this quary must use--->  use DB;       
       // $categories = DB::table('categories')->where('publication_status',1)->get();

       
       $categories = DB::select('select * from categories where publication_status=1');

       return view('admin.product.product_form',['categories'=>$categories]);

       
        
    }



    
    function product_save(Request $request)
    {

//  If you want to check file 

      // print_r($request->all());

      /* if($request->hasfile('product_image'))
       {
           echo 'Achi';
       }
       else{
           echo 'Nai';
       }
       */


         // Validation check ------Start
         $this->validate($request, [
           'product_name'       => 'required|unique:products,product_name',
           'category_id'       => 'required',
           'brand_id'       => 'required',
           'product_short_description'       => 'required',
           'product_long_description'       => 'required',
           'product_price'       => 'required',
           'publication_status'       => 'required',
           'image' => 'required|file|max:8000',
          
           
       ],
       [

           'product_name.required'       => 'Please Provide a product name',
           'category_id.required'       => 'Please Provide a category  name',
           'brand_id.required'       => 'Please Provide a brand  name',
           'product_short_description.required'       => 'Please Provide product short description ',
           'product_long_description.required'       => 'Please Provide product long description ',
           'product_price.required'       => 'Please Provide product price ',
           'publication_status.required'       => 'Please Provide a publication status name',
           'image.required'       => 'You must use the Choose file',
           'image.max'       => 'Maximum file size to upload is 1MB (1024 KB).',
           



       ]);


     

        $product = new Product;
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;
        $product->product_name = $request->product_name;        
        $product->product_short_description = $request->product_short_description;
        $product->product_long_description = $request->product_long_description;
        $product->product_price = $request->product_price;
        $product->publication_status = $request->publication_status;
        $product->image = $request->image;


        //$img = Image::make('public/foo.jpg')->resize(300, 200);

        if ($request->image) {

            $image = $request->file('image');
           $img = time() . '.'. $image->getClientOriginalExtension();
           $location = public_path('images/'.$img);
            Image::make($image)->save($location)->resize(300, 200);
             $product->image = $img;

         }

        $product->save();



        //session()->flash('success','A new category has added  successfully !!'); 
        
         //return back(); or
        // return redirect('/category/form');

        return redirect('/product/add')->with('success', 'A new Product has added  successfully !!'); 
        
        
    }






     public function manage_product(){

        //$products = Product::paginate(8);
         $products = Product::orderBy('id','desc')->paginate(8);
         return view('admin.product.manage_product',['products'=>$products]);

         
     }

     
     
     

     public function delete_product_manage(){

         // Show delete product 
         $soft_delete_products = Product::onlyTrashed()->paginate(8);
         return view('admin.product.delete_product_manage',['soft_delete_products'=>$soft_delete_products]);
         
         
         
     }


     
     public function restore_product($id){

      // Show delete product 
       Product::withTrashed()->where('id', $id)->restore();
       return back()->with('success', 'Product Restore Successfully !!');

      
      
      
  }


    
     public function unpublished_product($id)
      {

        $product = Product::find($id);
        $product->publication_status = 0;
        $product->save();
        return back()->with('success', 'Product Unpublished Successfully !!');
    

       }

       public function published_product($id)
      {

        $product = Product::find($id);
        $product->publication_status = 1;
        $product->save();
        return back()->with('success', 'Product Published Successfully!!');

       }



       public function product_delete($id)
       {
 
         $product = Product::find($id);
         $product->delete();

         return back()->with('success', 'Product Delete Successfully!!');

        }







        

        public function force_delete_product($id)
       {
 
         Product::withTrashed()->where('id', $id)->forceDelete();


         return back()->with('success', 'Permanent Product Delete Successfully!!');

        }






        public function product_edit($id)
        {



            $categories = DB::select('select * from categories where publication_status=1');

            $products = Product::find($id);
    
            // $product = DB::select('select * from products where id=$id');
             return view('admin.product.product_edit',['categories'=>$categories,'product'=>$products]);
       
                 
        }



        

        public function product_update(Request $request, $id)
        {
   
   
             // Validation check ------Start
             $this->validate($request, [
               'product_name'       => 'required',
               'category_id'       => 'required',
               'product_short_description'       => 'required',
               'product_long_description'       => 'required',
               'product_price'       => 'required',
               'publication_status'       => 'required',
               'image' => 'image|nullable|max:5000',
              
               
              
               
           ],
           [
   
               'product_name.required'       => 'Please Provide a product name',
               'category_id.required'       => 'Please Provide a category  name',
               'product_short_description.required'       => 'Please Provide product short description ',
               'product_long_description.required'       => 'Please Provide product long description ',
               'product_price.required'       => 'Please Provide product price ',
               'publication_status.required'       => 'Please Provide a publication status name',
               'image.max'       => 'Maximum file size to upload is 5 MB (5024 KB).',
               'image.image'       => 'Please provide a valid image with .jpg , .png , .gif , .jpeg extrension...',
              
   
   
           ]);
   
            //return $request->all();
   
            $product = Product::find($id);
            $product->product_name = $request->product_name;
            $product->category_id = $request->category_id;
            $product->product_short_description = $request->product_short_description;
            $product->product_long_description = $request->product_long_description;
            $product->product_price = $request->product_price;
            $product->publication_status = $request->publication_status;
            $product->image = $request->image;
   
   
            //$img = Image::make('public/foo.jpg')->resize(300, 200);
    
            if ($request->image) {
   
               
   
   
   
               $image = $request->file('image');
             // $img = time() . '.'. $image->getClientOriginalExtension();
              $img = time() . '.'. $image->getClientOriginalExtension();
              $location = public_path('images/'.$img);
               Image::make($image)->save($location)->resize(300, 200);
                $product->image = $img;
   
           }
   
   
            $product->save();
   
   
            //session()->flash('success','A new category has added  successfully !!'); 
            
             //return back(); or
            // return redirect('/category/form');
   
            return redirect('/product/manage')->with('success', ' Product update  successfully !!'); 
            
            
        }



















}