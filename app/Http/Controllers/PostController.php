<?php

namespace App\Http\Controllers;

use App\Post;
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
        return Post::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/posts/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:3',
            'body' => 'required|min:10'
        ]);

        if (!auth()->id()) {
            return redirect('/login');
        }

        $post = new Post();
        $post->post_user_id = auth()->id();
        $post->title = $request->input('title');
        $post->subtitle = $request->input('subtitle', '');
        $post->body = $request->input('body');
        $post->picture_url = $request->input('picture_url', '');
        $post->picture_description = $request->input('description', '');

        $post->save();

        return redirect('/posts/' . $post->post_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('/posts/post', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('/posts/edit', ['post' => $post]);
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
        $request->validate([
            'title' => 'required|min:3',
            'body' => 'required|min:10'
        ]);

        if (!auth()->id()) {
            return redirect('/');
        }

        $post->post_user_id = auth()->id();
        $post->title = $request->title;
        $post->subtitle = $request->subtitle ?? '';
        $post->body = $request->body;
        $post->picture_url = $request->picture_url ?? '';
        $post->picture_description = $request->description ?? '';

        $post->save();

        return redirect('/posts/' . $post->post_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
