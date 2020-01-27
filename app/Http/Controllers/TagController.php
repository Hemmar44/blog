<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;

class TagController extends Controller
{
    public function create()
    {
        if (!auth()->id()) {
            return redirect('/login');
        }
        return view('/tags/create');
    }

    public function store(Request $request)
    {
        if (!auth()->id()) {
            return redirect('/login');
        }

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
