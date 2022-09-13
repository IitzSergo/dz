@extends('layouts.app')
@section('content')
    <div class="card flex-row align-items-center mt-5">
        <img src="{{ Storage::url($article->image) }}" class="rounded m-3 align-self-start" alt="..."
            style="height: 100px; width: 100px; object-fit: cover">
        <div class="card-body">

            <h3 class="card-title">{{ $article->name }}</h3>
            <p class="card-text">{!! $article->content !!}</p>

        </div>
        <div class="date align-self-start">
            <h6 class="m-4">{{ date('d.m.Y H:m', strtotime($article->created_at)) }}</h6>
        </div>



    </div>
    <br>

    <div class="card flex-column">
        <div class="flex-row align-content-stretch  mt-1">
            @if (Auth::user())
                <form action="{{ route('postcomment', $article->slug) }}" method="POST">
                    @csrf
                    <div class="form-group mt-3 w-100">
                        <textarea name="comment" id="comment" class="form-control w-100 @error('comment') is-invalid @enderror"
                            placeholder="Write your comment"></textarea>
                        @error('comment')
                            <div class="invalid-feedback is-invalid">{{ $message }}</div>
                        @enderror
                    </div>
                    <button class="btn btn-primary mt-3 align-self-end">Add comment</button>
                </form>
            @else
                <h5 class="text-danger m-2">Only authorized users can leave comments - please login or register</h5>
            @endif
        </div>



    </div>
    <br>
    <h2 class="pt-3 ">Comments:</h2>
    <div class="card">

        @foreach ($comments as $comment)
            <div>
                <h4>User: {{ $comment->user->name }}</h4>
                <p>Comment: {{ $comment->comment_text }}</p>
                <hr>
            </div>
        @endforeach
    </div>
@endsection
