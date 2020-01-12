<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('/posts/index', ['posts' => Post::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!auth()->id()) {
            return redirect('/login');
        }

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

        Post::create([
            'post_user_id' => auth()->id(),
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'body' => $request->body,
            'picture_url' => $request->picture_url,
            'picture_description' => $request->description
        ]);

        return redirect('/posts/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('/posts/post', ['post' => $post, 'is_logged' => !auth()->guest()]);
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
