<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Exports\ProductsExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ProductsImport;


use DB;
use App\Product;
use App\Category;
use App\Supplier;
use Image;
use File;

class ProductController extends Controller
{
    



    Public function product_form_show(){



        // $category = Category::orderBy('id','desc')->get();      if we use this quary must use--->  use App\Category;
        // $category = DB::table('categories')->get();             if we use this quary must use--->  use DB;       
        // $categories = DB::table('categories')->where('publication_status',1)->get();
 
        
 
        return view('admin.product.product_form');
 
        
         
     }
 
 
 
     
     function product_save(Request $request)
     {
 
        		
 

         $product = new Product;
         $product->cat_id = $request->cat_id;
         $product->sup_id = $request->sup_id;
         $product->product_name = $request->product_name;        
         $product->product_Code = $request->product_Code;
         $product->product_short_description = $request->product_short_description;
         $product->buying_price = $request->buying_price;
         $product->selling_price = $request->selling_price;
         $product->publication_status = $request->publication_status;
         $product->image = $request->image;

 
         //$img = Image::make('public/foo.jpg')->resize(300, 200);
         if ($request->image) {
 
             $image = $request->file('image');
            $img = time() . '.'. $image->getClientOriginalExtension();
            $location = public_path('/admin/product/'.$img);
            Image::make($image)->save($location)->resize(300, 200);
              $product->image = $img;
          }
 
         $product->save();
 
         //session()->flash('success','A new category has added  successfully !!'); 
          //return back(); or
         // return redirect('/category/form');
 
         return redirect('/product/add')->with('sucess', 'A new Product has added  successfully !!'); 
         
         
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
 
 
 
 
 
 
 
         
 
       
 
         public function product_edit($id)
         {
 
             $categories = DB::select('select * from categories where publication_status=1');
             $products = Product::find($id);
     
             // $product = DB::select('select * from products where id=$id');
              return view('admin.product.product_edit',['categories'=>$categories,'product'=>$products]);
                  
         }
 
 
 
         
 
         public function product_update(Request $request, $id)
         {
    
    
             
    
             //return $request->all();
    
             $product = Product::find($id);
             $product->cat_id = $request->cat_id;
             $product->sup_id = $request->sup_id;
             $product->product_name = $request->product_name;        
             $product->product_Code = $request->product_Code;
             $product->product_short_description = $request->product_short_description;
             $product->buying_price = $request->buying_price;
             $product->selling_price = $request->selling_price;
             $product->publication_status = $request->publication_status;
             $product->image = $request->image;
     
     
             //$img = Image::make('public/foo.jpg')->resize(300, 200);
             if ($request->image) {
     
                 $image = $request->file('image');
                $img = time() . '.'. $image->getClientOriginalExtension();
                $location = public_path('/admin/product/'.$img);
                Image::make($image)->save($location)->resize(300, 200);
                  $product->image = $img;
              }
     
             $product->save();

             //session()->flash('success','A new category has added  successfully !!'); 
              //return back(); or
             // return redirect('/category/form');
    
             return redirect('/product/manage')->with('success', ' Product update  successfully !!');   
         }


         // Excel Import & Export 


         
    Public function import_product(){
 
        return view('import_product');
 
     }


     public function export() 
     {
         return Excel::download(new  ProductsExport, 'products.xlsx');
     }

     public function import(Request $request) 
     {

      $import = Excel::import(new ProductsImport, $request->file('import_file'));

      if($import){

        return redirect('/product/manage')->with('sucess', 'Product Import successfully '); 


      }else{
        return redirect('import_product')->with('sucess', 'Product Not Import  successfully '); 


      }


     }

     
 

         
 
 





}
