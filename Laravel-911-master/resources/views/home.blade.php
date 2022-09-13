@extends('layouts.app')

@section('content')
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

                </tr>
            @endforeach

        </tbody>
    </table>
@endsection
