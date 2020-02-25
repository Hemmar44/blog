<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use App\Tag;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view(
            '/posts/index',
            [
                'posts' => Post::orderByDesc('created_at')->paginate(5)
            ]);
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

        return view('/posts/create', ['tags' => Tag::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!auth()->id()) {
            return redirect('/login');
        }

        $request->validate([
            'title' => 'required|min:3',
            'body' => 'required|min:10'
        ]);

        $post = Post::create([
            'post_user_id' => auth()->id(),
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'body' => $request->body,
            'picture_url' => $request->picture_url,
            'picture_description' => $request->description,
        ]);


        if (!empty($request->tags)) {
            $post->tags()->sync($request->tags);
        }

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
        return view(
            '/posts/post',
            [
                'post' => $post,
                'is_logged' => !auth()->guest()
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post $post
     * @param Tag $tags
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post, Tag $tags)
    {
        $tagIds = [];

        foreach ($post->tags as $tag) {
            $tagIds[] = $tag->tag_id;
        }

        return view(
            '/posts/edit',
            [
                'post' => $post,
                'tags' => Tag::all(),
                'post_tag_ids' => $tagIds
            ]
        );
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

        if (!empty($request->tags)) {
            $post->tags()->sync($request->tags);
        }

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
        try {
            $post->delete();
            return response([], 200);
        } catch (\Exception $exception) {
            return response([], 405);
        }
    }

    public function showByTag(Tag $tag)
    {
        $tag->popularity = $tag->popularity + 1;
        $tag->save();

        return view(
            '/posts/index',
            [
                'posts' => $tag->posts()->orderByDesc('created_at')->paginate(5),
                'tag' => $tag
            ]
        );
    }
}
