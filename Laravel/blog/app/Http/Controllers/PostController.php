<?php

namespace App\Http\Controllers;

use App\Post;
use App\Category;
use App\Tag;
use Session;
use Image;
use File;
use DB;


use Illuminate\Support\Str;


use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $posts= DB::table('posts')
        // ->join('categories','posts.category_id','categories.id')
        // ->select('categories.name','posts.*')
        // ->paginate(5);

        $posts = Post::orderBy('created_at', 'DESC')->paginate(5);
        return view('admin.post.index', compact('posts'));
        

        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $tags = Tag::all();
        $categories = Category::all();
        return view('admin.post.create', compact(['categories','tags']));


       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
                                                 	
        $this->validate($request, [
            'title' => 'required|unique:posts,title',
           
            'category_id' => 'required',
            'description' => 'required',
        ]);

        $post = Post::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title, '-'),
            'description' => $request->description,
            'category_id' => $request->category_id,
            'user_id' => 1,

        ]);


        
   

        if($request->hasFile('image')){
            $image = $request->image;
            $image_new_name = time() . '.' . $image->getClientOriginalExtension();
            $image->move('storage/post/', $image_new_name);
            $post->image = '/storage/post/' . $image_new_name;
        }

        $post->tags()->attach($request->tags);

        // $post = new Post;
        // $post->title = $request->title;
        // $post->slug = Str::slug($request->title, '-');
        // $post->description = $request->description;
        // $post->category_id = $request->category_id;
        // $post->user_id = 1;
        // $post->tags()->attach($request->tags);

        

    //     if ($request->image) {
    //        $image = $request->file('image');
    //      // $img = time() . '.'. $image->getClientOriginalExtension();
    //       $img = time() . '.'. $image->getClientOriginalExtension();
    //       $location = public_path('/admin/post/'.$img);
    //    //    $location = public_path('images/'.$img);
    //        Image::make($image)->save($location)->resize(300, 200);
    //         $post->image = $img;

    //    }

        $post->save();

        Session::flash('success', 'Post created successfully ');
        return redirect()->back();


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('admin.post.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    

    public function edit(Post $post)
    {
        $tags = Tag::all();

        $categories = Category::all();
        return view('admin.post.edit', compact('post','categories','tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $this->validate($request, [
            'title' => 'required',
           
            'category_id' => 'required',
            'description' => 'required',
        ]);

        $post->title = $request->title;
        $post->slug = Str::slug($request->title, '-');
        $post->description = $request->description;
        $post->category_id = $request->category_id;
        $post->user_id = 1;
        $post->tags()->sync($request->tags);

     
   

        if($request->hasFile('image')){
            $image = $request->image;
            $image_new_name = time() . '.' . $image->getClientOriginalExtension();
            $image->move('storage/post/', $image_new_name);
            $post->image = '/storage/post/' . $image_new_name;
        }


        $post->save();

     
        Session::flash('success', 'Post Update successfully ');
        return redirect('/posts');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
   
    public function destroy(Post $post)
    {
        if($post){
            $post->delete();

            Session::flash('success', 'Post deleted successfully');
            return back();
        }
    }

}
