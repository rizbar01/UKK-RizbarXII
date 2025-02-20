<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Album;
use App\Models\Images;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $images = Images::all();
        return view('picturePost.pictures', compact('images'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $albums = Album::all();

        return view('picturePost.create', compact('albums'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'required|mimes:jpeg,jpg,png|max:10240',
            'description' => 'nullable',
            'album_id' => 'required'
        ]);

        $validate['image'] = $request->file('image')->store('image', 'public');

        Images::create($validate);
        return redirect()->route('pictures.index')->with('success', 'Upload Successed!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $image = Images::find($id);
        $comments = Comment::all();
        $like = Like::all();

        return view('picturePost.show', compact('image', 'comments', 'like'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $image = Images::find($id);
        $albums = Album::all();

        return view('picturePost.edit', compact('image', 'albums'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $image = Images::find($id);

        $validate = $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|mimes:jpeg,jpg,png|max:10240',
            'description' => 'nullable',
            'album_id' => 'required'
        ]);

        if ($request->hasFile('image')) {
            if ($image->image) {
                Storage::delete($image->image);
            }

            $validate['image'] = $request->file('image')->store('image', 'public');
        }

        $image->update($validate);
        return redirect()->route('pictures.index')->with('success', 'Update Successed!');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $image = Images::find($id);
        Storage::delete($image->image);

        $image->delete();
        return redirect()->route('pictures.index')->with('success', 'Delete Successed!');
    }
}
