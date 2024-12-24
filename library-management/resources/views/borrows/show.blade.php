@extends('layouts.App')

@section('content')
<div class="card">
    <div class="card-header">
        <h3>Borrow Details</h3>
    </div>
    <div class="card-body">
        <p><strong>Reader:</strong> {{ $borrow->reader->name }}</p>
        <p><strong>Book:</strong> {{ $borrow->book->name }}</p>
        <p><strong>Borrow Date:</strong> {{ $borrow->borrow_date }}</p>
        <p><strong>Return Date:</strong> {{ $borrow->return_date }}</p>
        <p><strong>Status:</strong> {{ $borrow->status ? 'Returned' : 'Borrowed' }}</p>
        <a href="{{ route('borrows.index') }}" class="btn btn-secondary">Back</a>
    </div>
</div>
@endsection
