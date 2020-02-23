<?php

namespace App\Http\Controllers;

use App\Post;

class GalleryController extends Controller
{
    public function show()
    {
        $pictures = array_map(function ($url):string {
            return asset('img/') . $url;
        }, Post::pluck('picture_url')->toArray());

        return view('gallery\gallery', ['pictures' => $pictures]);
    }
}
