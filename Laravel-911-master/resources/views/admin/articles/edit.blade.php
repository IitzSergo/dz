@extends('layouts.admin')

@section('content')
    <h1>Edit article</h1>
    <form action="{{ route('articles.update', ['article' => $article->id]) }}" method="POST">
        @method('PUT')
        @csrf
        @include('admin.articles._form')
        <br>

        <button class="btn btn-primary">Save</button>
    </form>
@endsection
