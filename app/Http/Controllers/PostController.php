<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;


class PostController extends Controller

{
   


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();
        return view('post.show_post', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('post.add_post');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $img=$request->file('image')->getClientOriginalName();
        $path=$request->file('image')->storeAs('images',$img,'image');
        $insert_post = new Post();
        $insert_post->text = $request->text;
        $insert_post->image = $img;
        $insert_post->data_time = $request->data_time;
        $insert_post->save();

        return "تمت الإضافة بنجاح";
    }



    /**
     * Display the specified resource.
     */
    public function show(post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $edit_post=post::find($id);
      
        return view('post/edit_post',compact('edit_post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $insert_post=post::find($id);
        $insert_post->text=$request->text;
        $insert_post->image=$request->image;
        $insert_post->data_time=$request->data_time;
        $insert_post->save();
        return "تم  التعديل بنجاح";
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
    post::destroy($id);
     return "تم الحذف بنجاح";
    }
}
