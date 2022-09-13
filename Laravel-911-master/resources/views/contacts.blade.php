@extends('main')

@section('content')
    <h1>{{ $title }}</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif


    <form action="{{ route('mailHelper') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="name">Your name</label>
            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror"
                value="{{ old('name') }}" />
            @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="form-group mt-3">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control @error('name') is-invalid @enderror"
                value="{{ old('email') }}" />
            @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="form-group mt-3">
            <label for="message">Your massage</label>
            <textarea name="message" id="messege" class="form-control @error('name') is-invalid @enderror"> {{ old('message') }}</textarea>
            @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <button class="btn btn-primary mt-3">Send</button>

    </form>
@endsection
@section('title', $title)
