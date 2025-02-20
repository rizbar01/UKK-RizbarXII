@extends('navbar.main')
@section('content')
    <h1 class="text-center">{{ $album->nama_album }}</h1>
    <div class="row mt-5">
        @foreach ($album->images as $image)
            <div class="col-3">
                <div class="card" style="width: 18rem;">
                    <img src="{{ asset('storage/' . $image->image) }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{ $image->name }}</h5>
                        <p class="card-text">{{ $image->description }}</p>
                        <a href="{{ route('pictures.edit', $image->id) }}" class="btn btn-warning">Rework</a>
                        <form action="{{ route('pictures.destroy', $image->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Are You Sure Delete This?!')"
                                class="btn btn-danger">Erase</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach

    </div>
@endsection
