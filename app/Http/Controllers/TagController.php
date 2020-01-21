<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        return $request->validate([
            'name' => 'required|min:3',
        ]);
    }
}
