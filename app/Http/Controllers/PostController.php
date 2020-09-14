<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //

    public function allPost()
    {
        $post=Post::get();
        return view('posts',[
            'posts'=> $post
        ]);


    }

    public function show($id)
    {
        $post=Post::findOrFail($id);
        return view('show',compact('post'));
    }
    public function create()
    {
        return view('create');
    }
    public function store(Request $request)
    {
        //validaion

        $request->validate([
            'title' =>'required|string|max:100',
            'desc'=>'required|string',
            'content'=>'required|string',
            'image'=>'image|mimes:jpeg,png'
        ]);

        //move
        $img=$request->file('image');
        $ext=$img->getClientOriginalExtension();
        $name="post-".uniqid().".$ext";
        $img->move(public_path("uploads"),$name);


        //store
        Post::create([
            'title'=>$request->title,
            'desc'=>$request->desc,
            'content'=>$request->content,
            'image'=>$name
        ]);

        return redirect(route('post.all'));
    }

    public function edit($id)
    {
        $post=Post::findOrFail($id);
        return view('edit',compact('post'));
    }

    public function updata(Request $request ,$id)
    {
        //validation
        $request->validate([
            'title' =>'required|string|max:100',
            'desc'=>'required|string',
            'content'=>'required|string',
            'image'=>'image|mimes:jpeg,png'
        ]);

        $post=Post::findOrFail($id);
        $name=$post->image;

        if ($request->hasFile('image'))
        {
            if ($name !== null)
            {
                unlink(public_path('uploads/'.$name));
            }

            //move
            $img=$request->file('image');
            $ext=$img->getClientOriginalExtension();
            $name="post-".uniqid().".$ext";
            $img->move(public_path("uploads"),$name);

        }

        $post->update([
            'title'=>$request->title,
            'desc'=>$request->desc,
            'content'=>$request->content,
            'image'=>$name
        ]);

        return redirect(route('post.edit',$id));


    }

    public function delete($id)
    {
        $post=Post::findOrFail($id);
        if ($post->image !== null){

            unlink(public_path('uploads/').$post->image);

            }

            $post->delete();

            return redirect(route('post.all'));


    }


}
