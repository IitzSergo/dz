@extends('layouts.admin')

@section('content')
    <h1 class="text-center">Articles category</h1>
    <form action="{{ route('articles.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @include('admin.articles._form')
        <br>

        <button class="btn
        btn-primary">Save</button>
    </form>
@endsection
