<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Category;
use Image;
use File;

class CategoriesController extends Controller
{

         //...........................................Category Index............................


     
    public function index()
    {
        $categories = Category::orderBy('id','desc')->get();

         return view('backend.pages.categories.index',['categories'=>$categories]);

        }

         //------------------------------------------Category Create-------------------------

    public function create()
    {
        
        $main_categories = Category::orderBy('name','desc')->where('parent_id',NULL)->get();

        return view('backend.pages.categories.create',['main_categories'=>$main_categories]);

    
    }


   


    //--------------------------------------------------Category Store-------------------------------


    public function store(Request $request)
    {

        // Validation check ------Start
        $this->validate($request, [
            'name'       => 'required',
            'image'       => 'nullable|image',
            
        ],
        [

            'name.required'       => 'Please Provide a category name',
            'image.image'       => 'Please provide a valid image with .jpg , .png , .gif , .jpeg extrension...',


        ]);

        // Validation check ------End

        $category = new Category();
        $category->name = $request->name;
        $category->description = $request->description;
        $category->parent_id = $request->parent_id;
     


                   //insert  image

         if ($request->image) {

                       $image = $request->file('image');
                      $img = time() . '.'. $image->getClientOriginalExtension();
                      $location = public_path('images/categories/'.$img);
                       Image::make($image)->save($location); 
                        $category->image = $img;
        
           }

        $category->save();

        session()->flash('success','A new category has added  successfully !!');

        return redirect()->route('admin.categories');
    }



//----------------------------------------Category Edit----------------------------


public function edit($id)
{
    $main_categories = Category::orderBy('name','desc')->where('parent_id',NULL)->get();

    $category = Category::find($id);

    // $product = DB::select('select * from products where id=$id');
     return view('backend.pages.categories.edit', compact('category', 'main_categories'));
     

}


//----------------------------------------Category Delete----------------------------


public function delete($id)
{


    $category = Category::find($id);

    if(!is_null($category)){

                 //If it is parent category , then delete all its sub category

        if ($category->parent_id == NULL){
                
                  // Delete sub category 

             $sub_categories = Category::orderBy('name','desc')->where('parent_id',$category->id)->get();

             foreach ($sub_categories as $sub){

                        // Delete sub category image
            if (File::exists('images/categories/'.$sub->image)){
                 File::delete('images/categories/'.$sub->image);
        }

                $sub->delete();
             }




        }

                 // Delete category image
        if (File::exists('images/categories/'.$category->image)){
            File::delete('images/categories/'.$category->image);
        }

        $category->delete();
    }

   session()->flash('success','Category has deleted successfully ');
   return back();  

}



//........................................Category Update..................................



public function update(Request $request, $id)
    {

        // Validation check ------Start
        $this->validate($request, [
            'name'       => 'required',
            'image'       => 'nullable|image',
            
        ],
        [

            'name.required'       => 'Please Provide a category name',
            'image.image'       => 'Please provide a valid image with .jpg , .png , .gif , .jpeg extrension...',


        ]);

        // Validation check ------End

        $category = Category::find($id);
        $category->name = $request->name;
        $category->description = $request->description;
        $category->parent_id = $request->parent_id;
     


                   //insert  image

         //if (count($request->image) > 0)
         if ($request->image) {
             // Delete the old image from folder

             if (File::exists('images/categories/'.$category->image)){
                 File::delete('images/categories/'.$category->image);
             }

                       $image = $request->file('image');
                      $img = time() . '.'. $image->getClientOriginalExtension();
                      $location = public_path('images/categories/'.$img);
                       Image::make($image)->save($location); 
                        $category->image = $img;
        
           }

        $category->save();

        session()->flash('success',' Category has updated  successfully (~_~) ');

        return redirect()->route('admin.categories');
    }


}


