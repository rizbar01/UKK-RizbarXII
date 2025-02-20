<?php

namespace App\Http\Controllers;

use App\Models\Album;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    public function index()
    {
        $albums = Album::all();
        return view('album.index', compact('albums'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('album.create');

    }

    public function show(string $id)
    {
        $album = Album::find($id);
        
        return view('album.show', compact('album'));

    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'nama_album' => 'required|string|max:255',
            'deskripsi_album' => 'nullable',
        ]);


        Album::create($validate);
        return redirect()->route('albums.index')->with('success', 'Upload Successed!');
    }

    public function edit(string $id)
    {
        $album = Album::find($id);

        return view('album.edit', compact('album'));

    }

    public function update(Request $request, string $id)
    {
        $album = Album::find($id);

        $validate = $request->validate([
            'nama_album' => 'required|string|max:255',
            'deskripsi_album' => 'nullable',
        ]);

        $album->update($validate);
        return redirect()->route('albums.index')->with('success', 'Update Successed!');


    }
    public function destroy(string $id)
    {
        $album = Album::find($id);

        $album->delete();
        return redirect()->route('albums.index')->with('success', 'Delete Successed!');
    }
}
