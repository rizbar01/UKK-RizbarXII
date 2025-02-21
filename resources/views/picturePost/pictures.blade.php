@extends('navbar.main')
@section('content')
    <h5 class="text-center">Welcome to The Gallery</h5>
    <h1 class="text-center">Pictures</h1>
    <div class="d-flex justify-content-center">
        <a href="{{ route('pictures.create') }}" class="btn btn-primary text-center">Upload Your Image</a>
    </div>

    <div class="row mt-5">
        @foreach ($images as $image)
            <div class="col-3">
                <div class="card" style="width: 18rem;">
                    <img src="{{ asset('storage/' . $image->image) }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{ $image->name }}</h5>
                        <p class="card-text">{{ $image->description }}</p>
                        <div class="flex justify-content-center">
                            <a href="{{ route('pictures.show', $image->id) }}" class="btn btn-success">Show</a>
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
            </div>
        @endforeach

    </div>
@endsection
