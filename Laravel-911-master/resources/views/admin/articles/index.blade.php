@extends('layouts.admin')

@section('content')
    <h1>Articale</h1>
    <br>

    <a href="{{ route('articles.create') }}" class="btn btn-primary">Create articales</a>


    @if ($articles->count() === 0)
        <p>No articles</p>
    @endif

    @include('message')

    <table class="table">
        <thead>
            <tr>
                <th>№</th>
                <th>Image</th>
                <th>Name</th>
                <th>Content</th>
                <th>Category</th>
                <th></th>
            </tr>
        </thead>
        <tbody>

            @foreach ($articles as $article)
                <tr>
                    <td>{{ $loop->iteration + ($articles->currentPage() - 1) * $articles->perPage() }}</td>
                    <td><img src="{{ Storage::url($article->image) }}" alt="{{ $article->name }}" style="width: 100px">
                    </td>
                    <td>
                        <a href="{{ route('articles.edit', ['article' => $article->id]) }}">{{ $article->name }}</a>
                    </td>
                    <td>{!! $article->shortContent !!}</td>
                    <td>{{ $article->category->name }}</td>
                    <td>
                        <form action="{{ route('articles.destroy', ['article' => $article->id]) }}" method="POST">
                            @method('DELETE')
                            @csrf

                            <button class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
    {{ $articles->links() }}
@endsection
