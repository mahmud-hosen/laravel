<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Contact;
use Yajra\DataTables\DataTables;




class ContactController extends Controller
{
    public function Contact(){

        return view('Contact');
    }

   

    public function postContact(Request $request){

       

        $data=array();
        $data['name']=$request->name;
        $data['email']=$request->email;
        $data['phone']=$request->phone;

        $insert=DB::table('contacts')->insert($data);

       return ['success'=>true,'message'=>'Data Insert Successfully'];
    
        
    }

    //------------------------------------------------------------ Live Search --------------------------------------------

    public function live_search(){
        return view('live_search');

    }

    public function search_data_read(Request $request){



        $search=$request->usearch;
        if($search)
        {
            $searchs = DB::table('contacts')
            ->Where('name', 'like', '%'.$search.'%')
            ->get();
        }

        if($searchs){
           
            foreach($searchs as  $search ){
                echo '<tr><td>'.$search->name.'</td><td>'.$search->email.'</td></tr>';
                
            }
        }
    }


    //------------------------------------------------------------ Data_insert_with_show -------------------------------


    public function data_insert_with_show(){

        return view('data_insert_with_show');
    }

    public function save_data(Request $request){

       

        $data=array();
        $data['name']=$request->name;
        $data['email']=$request->email;
        $data['phone']=$request->phone;

        $insert=DB::table('contacts')->insert($data);



      //  echo $customer= DB::table('contacts')->get();


         if($customer){
           
            foreach($customer as  $search ){
                echo '<tr ><td>'.$search->name.'</td><td>'.$search->email.'</td ><td>'.$search->phone.'</td></tr>'; 
            }
        }
        
    }

    //------------------------------------------------ yajra laravel-datatables ----------------------

    public function index(){

        return view('allcontact');
    }

 public function allcontact(){

    $contact=Contact::all();

    return Datatables::of($contact)
          ->addColumn('action',function($contact){

            '<a onclick="showData('.$contact->id.')" class="btn btn-success btn-sm">Show</a>'.' '.
            '<a onclick="editForm('.$contact->id.')" class="btn btn-info btn-sm">Edit</a>'.' '.
            '<a onclick="deleteData('.$contact->id.')" class="btn btn-danger btn-sm">Delete</a>';

          })->make(true);

    }




//------------------------------------------- Laravel Ajax Jquery CURD Controller ----------------------------------------


public function getIndex()
{
    return view('contact-jquery');
}
public function getData()
{
    return Contact::all();
}
public function postStore(Request $r)
{
    Contact::create($r->all());
    return ['success'=>true,'message'=>'Inserted Successfully'];
}
public function postUpdate(Request $r)
{
    if($r->has('id')){
        Contact::find($r->input('id'))->update($r->all());
        return ['success'=>true,'message'=>'Updated Successfully'];
    }
}
public function postDelete(Request $r)
{
    if($r->has('id')){
        Contact::find($r->input('id'))->delete();
        return ['success'=>true,'message'=>'Deleted Successfully'];
    }
}


  


    
}
