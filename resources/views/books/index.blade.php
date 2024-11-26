@extends('layouts.app')

@section('content')
    <h1>Books List</h1>
    <ul>
        @foreach($books as $book)
            <li>{{ $book->title }} by {{ $book->author }} (Category: {{ $book->category->name }}) 
                @if($book->is_borrowed) 
                    - Borrowed
                @else 
                    <a href="{{ route('books.borrow', $book->id) }}">Borrow</a>
                @endif
            </li>
        @endforeach
    </ul>
@endsection
