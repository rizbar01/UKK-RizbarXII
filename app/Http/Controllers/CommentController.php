<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $validate = $request->validate([
            'image_id' => 'required',
            'comment' => 'required|string|max:255',
        ]);


        Comment::create($validate);
        return redirect()->back()->with('success', 'Comment Up!');
    }
}
