<?php

namespace App\Http\Controllers;

use App\classes;
use Illuminate\Http\Request;



use DB;




class ClassesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $class=DB::table('classes')->get();
        return response()->json($class);

        //or we can use 
       // return classes::all();


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $validated = $request->validate([
            'class_name' => 'required|unique:classes|max:25',


        ]);

        Classes::create($request->all());
        return response('Store Done');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\classes  $classes
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $show=DB::table('classes')->where('id',$id)->first();
      return response()->json($show);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\classes  $classes
     * @return \Illuminate\Http\Response
     */
    public function edit(classes $classes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\classes  $classes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data=array();
        $data['class_name']=$request->class_name;
        DB::table('classes')->where('id',$id)->update($data);
        return response('Update');



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\classes  $classes
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('classes')->where('id',$id)->delete();
        return response('Delete');
    }
}
