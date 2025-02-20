@extends('navbar.main')
@section('content')
    <form action="{{ route('albums.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="formGroupExampleInput" class="form-label">Name</label>
            <input type="text" name="nama_album" class="form-control" id="formGroupExampleInput"
                placeholder="Name The Album!">
        </div>
        <div class="mb-3">
            <label for="formGroupExampleInput2" class="form-label">Description</label>
            <textarea class="form-control" name="deskripsi_album" id="formGroupExampleInput2" rows="3"
                placeholder="Describe it!"></textarea>
        </div>
        <button class="btn btn-primary" type="submit">Upload</button>
    </form>
@endsection
