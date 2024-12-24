@extends('layouts.App')

@section('content')
<div class="card">
    <div class="card-header">
        <h3>Book Details</h3>
    </div>
    <div class="card-body">
        <p><strong>Name:</strong> {{ $book->name }}</p>
        <p><strong>Author:</strong> {{ $book->author }}</p>
        <p><strong>Category:</strong> {{ $book->category }}</p>
        <p><strong>Year:</strong> {{ $book->year }}</p>
        <p><strong>Quantity:</strong> {{ $book->quantity }}</p>
        <a href="{{ route('books.index') }}" class="btn btn-secondary">Back</a>
    </div>
</div>
@endsection
