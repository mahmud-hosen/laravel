<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use App\Brand;
use Image;
use File;

class BrandController extends Controller
{
    public function brand_form(){

        return view('admin\brand\brand_add_form');
        
    }

   


    public function brand_save(Request $request)
     {


         $brand = new Brand;
         $brand->brand_name = $request->brand_name;
         $brand->brand_description = $request->brand_description;
         $brand->publication_status = $request->publication_status;


         if ($request->image) {
   
            $image = $request->file('image');
          // $img = time() . '.'. $image->getClientOriginalExtension();
           $img = time() . '.'. $image->getClientOriginalExtension();
           $location = public_path('/admin/brand/'.$img);
        //    $location = public_path('images/'.$img);


            Image::make($image)->save($location)->resize(300, 200);
             $brand->image = $img;

        }

         $brand->save();

          session()->flash('sucess','A new brand has added  successfully !!'); 
          return redirect('/brand/form')->with('success', 'A new brand has added  successfully !!'); 

            
         
     }


     
     public function manage_brand(){

        //$categoris = brand::paginate(8);
       $brands = Brand::orderBy('id','desc')->paginate(8);
         return view('admin\brand\manage_brand',['brands'=> $brands]);

           
     }


     
     public function unpublished_brand($id)
      {

        $brand = Brand::find($id);
        $brand->publication_status = 0;
        $brand->save();
        return back()->with('success', 'Brand Unpublished Successfully !!');
    

       }

       public function published_brand($id)
      {

        $brand = Brand::find($id);
        $brand->publication_status = 1;
        $brand->save();
        return back()->with('success', 'Brand Published Successfully!!');

       }

       
       public function brand_delete($id)
       {
 
         $brand = Brand::find($id);
         
         $brand->delete();
         return back()->with('success', 'Brand Delete Successfully!!');

        }


        public function brand_edit($id)
        {
            $brand = Brand::find($id);
    
            // $product = DB::select('select * from products where id=$id');
             return view('admin.brand.brand_edit_form',['brand'=>$brand]);
             
             
        
        }


        
    public function brand_update(Request $request, $id)
    {




         // Validation check ------Start
         $this->validate($request, [
           'brand_name'       => 'required',
           'brand_description'       => 'required',
           'publication_status'       => 'required',
          
           
       ],
       [

           'brand_name.required'       => 'Please Provide a brand name',
           'brand_description.required'       => 'Please Provide a brand description name',
           'publication_status.required'       => 'Please Provide a publication status name',


       ]);

        //return $request->all();

        $brand = Brand::find($id);
        $brand->brand_name = $request->brand_name;
        $brand->brand_description = $request->brand_description;
        $brand->publication_status = $request->publication_status;
        $brand->save();


        //session()->flash('success','A new brand has added  successfully !!'); 
        
         //return back(); or
        // return redirect('/brand/form');

        return redirect('/manage/brand')->with('success', 'brand has updated  successfully!!'); 
        
        
    }

        





    
}
