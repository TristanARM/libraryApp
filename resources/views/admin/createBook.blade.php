@extends('layouts.app')

@section('content')
    <h1>Create New Book</h1>
    <form action="{{ route('admin.storeBook') }}" method="POST">
        @csrf
        <input type="text" name="title" placeholder="Book Title" required><br>
        <input type="text" name="author" placeholder="Author" required><br>
        <select name="category_id">
            @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select><br>
        <button type="submit">Add Book</button>
    </form>
@endsection
