<?php

namespace LaraDev\Http\Controllers;

use Illuminate\Http\Request;
use LaraDev\Models\Post;

class PostController extends Controller
{

    public function forceDelete($post)
    {
        Post::onlyTrashed()->where(['id' => $post])->forceDelete();
        return redirect()->route('post.trashed');
    }

    public function restore($post)
    {
        $post = Post::onlyTrashed()->where(['id' => $post])->first();

        if ($post->trashed()) {
            $post->restore();
        }

        return redirect()->route('post.trashed');
    }


    public function trashed()
    {
        $posts = Post::onlyTrashed()->get();
        return view('posts.trashed', ['posts' => $posts]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // echo "Listagem das minhas postagem";

        // $posts = Post::where('created_at', '>=', date('Y-m-d H:i:s'))->orderBy('title', 'desc')->take(2)->get();
        // foreach($posts as $post){
        //     echo "<h1> {$post->title}</h1>";
        //     echo "<h2> {$post->subtitle}</h2>";
        //     echo "<p> {$post->description}</p>";
        //     echo "<hr>";
        // }

        // $post = Post::where('created_at', '>=', date('Y-m-d H:i:s'))->first();
        // echo "<h1> {$post->title}</h1>";
        // echo "<h2> {$post->subtitle}</h2>";
        // echo "<p> {$post->description}</p>";
        // echo "<hr>";

        $posts = Post::all();

        return view('posts.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // $post  = new Post;
        // $post->title = $request->title;
        // $post->subtitle = $request->subtitle;
        // $post->description = $request->description;
        // $post->save();

        // Post::create([
        //     'title'=> $request->title,
        //     'subtitle'=> $request->subtitle,
        //     'description' => $request->description
        // ]);

        // $post =Post::firsrtOrNew([
        //     'title'=> $request->title,
        // ], [
        //     'subtitle'=> $request->subtitle,
        //     'description' => $request->description
        // ]);

        // $post->save();

        // $post =Post::firsrtOrCreate([
        //     'title'=> 'teste4'
        // ], [
        //     'subtitle'=> 'teste4',
        //     'description' => 'teste4'
        // ]);

        return redirect()->route('post.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \LaraDev\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \LaraDev\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('posts.edit', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \LaraDev\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //$post = new Post;
        $post = Post::find($post->id);
        $post->title = $request->title;
        $post->subtitle = $request->subtitle;
        $post->description = $request->description;
        $post->save();

        return redirect()->route('post.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \LaraDev\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        Post::find($post->id)->delete();
        return redirect()->route('post.index');
    }
}
