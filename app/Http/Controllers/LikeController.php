<?php

namespace App\Http\Controllers;

use App\Models\Images;
use App\Models\Like;
use Illuminate\Http\Request;

class LikeController extends Controller
{ public function store(Request $request)
    {
        $validate = $request->validate([
            'image_id' => 'required',
            'like' => 'required|string|max:255',
        ]);


        Like::create($validate);
        return redirect()->back()->with('success', 'Liked Up!');
    }

   
}
