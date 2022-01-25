<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

use App\Comment;



class CommentController extends Controller
{
    public function product_comment(Request $request ,$id){

       // return $request->id;

     //return  Session::get('customar_id');


     

     $comment = new Comment();

     $comment->post_id = $request->id;
     $comment->user_id = Session::get('customar_id');
     $comment->comment = $request->comment;
     $comment->status = $request->status;

     $comment->save(); 

     return back();


     



    }
}
