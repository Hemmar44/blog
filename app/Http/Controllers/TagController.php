<?php

namespace App\Http\Controllers;

class TagController extends Controller
{
    public function create()
    {
        if (!auth()->id()) {
            return redirect('/login');
        }
        return view('/tags/create');
    }
}
