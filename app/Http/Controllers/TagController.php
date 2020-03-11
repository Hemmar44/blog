<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;

class TagController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        return view('/tags/create');
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => 'required|unique:tags|min:2',
            ]
        );

        Tag::create($request->validate(
            [
                'name' => 'required|min:3'
            ]
        ));
    }
}
