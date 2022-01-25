<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Brand;
use Image;
use File;

class BrandsController extends Controller
{

         //...........................................Brand Index............................


     
    public function index()
    {
        $brands = Brand::orderBy('id','desc')->get();

         return view('backend.pages.brands.index',['brands'=>$brands]);

        }

         //------------------------------------------Brand Create-------------------------

    public function create()
    {
        

        return view('backend.pages.brands.create');

    
    }


   


    //--------------------------------------------------Brand Store-------------------------------


    public function store(Request $request)
    {

        // Validation check ------Start
        $this->validate($request, [
            'name'       => 'required',
            'image'       => 'nullable|image',
            
        ],
        [

            'name.required'       => 'Please Provide a brand name',
            'image.image'       => 'Please provide a valid image with .jpg , .png , .gif , .jpeg extrension...',


        ]);

        // Validation check ------End

        $brand = new Brand();
        $brand->name = $request->name;
        $brand->description = $request->description;
     


                   //insert  image

         if ($request->image) {

                       $image = $request->file('image');
                      $img = time() . '.'. $image->getClientOriginalExtension();
                      $location = public_path('images/brands/'.$img);
                       Image::make($image)->save($location); 
                        $brand->image = $img;
        
           }

        $brand->save();

        session()->flash('success','A new brand has added  successfully !!');

        return redirect()->route('admin.brands');
    }



//----------------------------------------Brand Edit----------------------------


public function edit($id)
{

    $brand = Brand::find($id);

    if (!is_null($brand)){
        return view('backend.pages.brands.edit', compact('brand'));
    }else {

        return redirect()->route('admin.brands');

    } 
}


//----------------------------------------Brand Delete----------------------------


public function delete($id)
{
    $brand = Brand::find($id);
    if(!is_null($brand)){

                 // Delete Brand image
        if (File::exists('images/brands/'.$brand->image)){
            File::delete('images/brands/'.$brand->image);
        }
        $brand->delete();
    }
   session()->flash('success','Brand has deleted successfully ');
   return back();  
}



//........................................Brand Update..................................



public function update(Request $request, $id)
    {

        // Validation check ------Start
        $this->validate($request, [
            'name'       => 'required',
            'image'       => 'nullable|image',
            
        ],
        [

            'name.required'       => 'Please Provide a brand name',
            'image.image'       => 'Please provide a valid image with .jpg , .png , .gif , .jpeg extrension...',


        ]);

        // Validation check ------End

        $brand = Brand::find($id);
        $brand->name = $request->name;
        $brand->description = $request->description;
     


                   //insert  image

         //if (count($request->image) > 0)
         if ($request->image) {
             // Delete the old image from folder

             if (File::exists('images/brands/'.$brand->image)){
                 File::delete('images/brands/'.$brand->image);
             }

                       $image = $request->file('image');
                      $img = time() . '.'. $image->getClientOriginalExtension();
                      $location = public_path('images/brands/'.$img);
                       Image::make($image)->save($location); 
                        $brand->image = $img;
        
           }

        $brand->save();

        session()->flash('success',' Brand has updated  successfully (~_~) ');

        return redirect()->route('admin.brands');
    }


}


