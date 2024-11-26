@extends('layouts.app')

@section('content')
    <h1>Create New Category</h1>
    <form action="{{ route('admin.storeCategory') }}" method="POST">
        @csrf
        <input type="text" name="name" placeholder="Category Name" required><br>
        <button type="submit">Add Category</button>
    </form>
@endsection
