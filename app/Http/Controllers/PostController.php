<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::with('categories')->get();
        return view('blog.index' , ['posts'=>$posts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('blog.create' , ['categories'=>$categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        $post=Post::create([
            'title' => $request->title,
            'body' => $request->body,
        ]);
        foreach ($request->category_id as $category){
            $category_id = (int)$category;
            $post->categories()->attach([$category_id]);
        }
        return redirect()->route('blog.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $id)
    {
    return view('blog.show' , ['post'=>$id]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $id)
    {
        $categories = Category::all();
        return view('blog.update' , ['post'=>$id , 'categories'=>$categories]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $post = Post::find($request->id);
        $post->update([
            'title' => $request->title,
            'body' => $request->body,
        ]);
        foreach ($request->category_id as $key => $category){
            $category_id = (int)$category;
            if ($key == 0)
                $post->categories()->sync([$category_id]);
            else
                $post->categories()->attach([$category_id]);

        }
        return redirect()->route('blog.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $id)
    {
        $post = Post::find($id->id);
        $post->categories()->detach();
        $post->delete();
        return redirect()->route('blog.index');
    }

}
