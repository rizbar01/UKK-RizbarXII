@extends('navbar.main')
@section('content')
<form action="{{ route('pictures.update', $image->id)}}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="formGroupExampleInput" class="form-label">Name</label>
        <input type="text" name="name" class="form-control" value="{{ $image->name}}" id="formGroupExampleInput" placeholder="Name The Image!">
      </div>
      <div class="mb-3">
        <label for="formGroupExampleInput2" class="form-label">Image</label>
        <input type="file" name="image" class="form-control" id="formGroupExampleInput2" placeholder="--jpg, jpeg or png--">
      </div>
      <div class="mb-3">
        <label for="formGroupExampleInput2" class="form-label">Description</label>
        <textarea class="form-control" name="description" id="formGroupExampleInput2" rows="3" placeholder="Describe it!">{{ $image->description }}</textarea>
      </div>
      <div class="mb-3">
        <select class="form-select" name="album_id" aria-label="Default select example">
            @foreach ($albums as $album)
                <option value="{{ $album->id }}">{{ $album->nama_album }}</option>
            @endforeach
        </select>
    </div>

      <button class="btn btn-primary" type="submit">Upload</button>
</form>
@endsection
