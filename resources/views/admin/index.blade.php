@extends('layouts.app')

@section('content')
    <h1>Admin Panel</h1>
    <h2>Books</h2>
    <ul>
        @foreach($books as $book)
            <li>{{ $book->title }} by {{ $book->author }} (Category: {{ $book->category->name }})</li>
        @endforeach
    </ul>

    <a href="{{ route('admin.createBook') }}">Add New Book</a>

    <h2>Categories</h2>
    <ul>
        @foreach($categories as $category)
            <li>{{ $category->name }}</li>
        @endforeach
    </ul>

    <a href="{{ route('admin.createCategory') }}">Add New Category</a>
@endsection
