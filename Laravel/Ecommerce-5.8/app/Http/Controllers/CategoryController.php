<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Image;
use File;


class CategoryController extends Controller
{



    public function category_form()
    {
        return view('admin.category.category_add_form');
        
        
    }

    


    public function category_save(Request $request)
    {

         // Validation check ------Start
         $this->validate($request, [
           'category_name'       => 'required|unique:categories,category_name',
           'category_description'       => 'required',
           'publication_status'       => 'required',
           
       ],
       [

           'category_name.required'       => 'Please Provide a category name',
           'category_description.required'       => 'Please Provide a category description name',
           'publication_status.required'       => 'Please Provide a publication status name',

       ]);

        //return $request->all();


        $category = new Category;
        $category->parent_id = $request->parent_id;
        $category->category_name = $request->category_name;
        $category->category_description = $request->category_description;
        $category->publication_status = $request->publication_status;

        				
        if ($request->image) {
   
            $image = $request->file('image');
          // $img = time() . '.'. $image->getClientOriginalExtension();
           $img = time() . '.'. $image->getClientOriginalExtension();
           $location = public_path('/admin/category/'.$img);
        //    $location = public_path('images/'.$img);

            Image::make($image)->save($location)->resize(300, 200);
             $category->image = $img;

        }



        $category->save();


        //session()->flash('success','A new category has added  successfully !!'); 
        
         //return back(); or
        // return redirect('/category/form');

        return redirect('/category/form')->with('success', 'A new category has added  successfully !!'); 
        
        
    }












     public function manage_category(){

        //$categoris = Category::paginate(8);
       $categoris = Category::orderBy('id','desc')->paginate(8);
         return view('admin.category.manage_category',['categories'=> $categoris]);
         
     }


     public function unpublished_category($id)
      {

        $category = Category::find($id);
        $category->publication_status = 0;
        $category->save();
        return back()->with('success', 'Category Unpublished Successfully !!');
    

       }

       public function published_category($id)
      {

        $category = Category::find($id);
        $category->publication_status = 1;
        $category->save();
        return back()->with('success', 'Category Published Successfully!!');

       }



       public function category_delete($id)
       {
 
         $category = Category::find($id);
         
         $category->delete();
         return back()->with('success', 'Category Delete Successfully!!');

        }
       
        


        public function category_edit($id)
    {
        $category = Category::find($id);

        // $product = DB::select('select * from products where id=$id');
         return view('admin.category.category_edit_form',['category'=>$category]);
         
         
    
    }


    
    public function category_update(Request $request, $id)
    {




         // Validation check ------Start
         $this->validate($request, [
           'category_name'       => 'required',
           'category_description'       => 'required',
           'publication_status'       => 'required',
          
           
       ],
       [

           'category_name.required'       => 'Please Provide a category name',
           'category_description.required'       => 'Please Provide a category description name',
           'publication_status.required'       => 'Please Provide a publication status name',


       ]);

        //return $request->all();

        $category = Category::find($id);
        $category->parent_id = $request->parent_id;
        $category->category_name = $request->category_name;
        $category->category_description = $request->category_description;
        $category->publication_status = $request->publication_status;



        if ($request->image) {
            // Delete the old image from folder

            if (File::exists('/admin/category/'.$category->image)){
                File::delete('/admin/category/'.$category->image);
            }

                      $image = $request->file('image');
                     $img = time() . '.'. $image->getClientOriginalExtension();
                     $location = public_path('/admin/category/'.$img);
                      Image::make($image)->save($location); 
                       $category->image = $img;
       
          }




        $category->save();



       

        //session()->flash('success','A new category has added  successfully !!'); 
        
         //return back(); or
        // return redirect('/category/form');

        return redirect('/category/manage')->with('success', 'Category has updated  successfully!!'); 
        
        
    }
        








     
}