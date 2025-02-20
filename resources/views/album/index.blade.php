@extends('navbar.main')
@section('content')
    <div class="d-flex justify-content-center">
        <a href="{{ route('albums.create') }}" class="btn btn-primary text-center">Make your album</a>
    </div>
    @foreach ($albums as $album)
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">{{ $album->nama_album }}</h5>
                <p class="card-text">{{ $album->deskripsi_album }}</p>
                <a href="{{ route('albums.show', $album->id) }}" class="btn btn-success">Show</a>
                <a href="{{ route('albums.edit', $album->id) }}" class="btn btn-warning">Rework</a>
                <form action="{{ route('albums.destroy', $album->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Are You Sure Delete This?!')"
                        class="btn btn-danger">Erase</button>
            </div>
        </div>
    @endforeach
@endsection
