@extends('layouts.admin')

@section('content')
    <h1>Edit category {{ $category->name }}</h1>

    <form action="{{ route('categories.update', ['category' => $category->id]) }}" method="POST">
        @method('PUT')
        @csrf

        <div class="form-group">
            <label for="name">Category name *:</label>
            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror"
                value="{{ old('name') ?? $category->name }}">
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button class="btn btn-primary mt-3">Save</button>
    </form>
@endsection
