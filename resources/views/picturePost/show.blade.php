@extends('navbar.main')
@section('content')
    <div class="card mb-3">
        <img src="{{ asset('storage/' . $image->image) }}" class="card-img-top" height="400px" alt="...">
        <div class="card-body">
            <h5 class="card-title">{{ $image->nama_image }}</h5>
            <p class="card-text">{{ $image->description }}</p>
            <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
            <i class="bi bi-hand-thumbs-up">{{$image->likes()->count()}}</i>
        </div>
    </div>


    <div class="row d-flex justify-content-center mb-4">
        <div class="col-md-8 col-lg-6">
            <div class="card shadow-0 border" style="background-color: #f0f2f5;">
                <div class="card-body p-4">
                    <form action="{{ route('comment.store') }}" method="post">
                        @csrf
                        <div data-mdb-input-init class="form-outline mb-4">
                            <input type="hidden" name="image_id" value="{{ $image->id }}" id="">
                            <input type="text" name="comment" id="addANote" class="form-control"
                                placeholder="Type comment..." />
                            <button class="btn btn-success mt-2" type="submit" for="addANote">Send Comment</button>
                        </div>

                    </form>
                    @foreach ($comments as $comment)
                        <div class="mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <p>{{ $comment->comment }}</p>

                                    <div class="d-flex justify-content-between">
                                        <div class="d-flex flex-row align-items-center">
                                            <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(32).webp"
                                                alt="avatar" width="25" height="25" />
                                            <p class="small mb-0 ms-2">Usergallery</p>
                                        </div>
                                        <div class="d-flex flex-row align-items-center">
                                            <p class="small text-muted mb-0">Upvote?</p>
                                            <i class="far fa-thumbs-up ms-2 fa-xs text-body"
                                                style="margin-top: -0.16rem;"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
