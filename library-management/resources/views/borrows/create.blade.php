@extends('layouts.App')

@section('content')
<div class="card">
    <div class="card-header">
        <h3>Add New Borrow</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('borrows.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="reader_id" class="form-label">Reader</label>
                <select name="reader_id" id="reader_id" class="form-control" required>
                    @foreach($readers as $reader)
                        <option value="{{ $reader->id }}">{{ $reader->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="book_id" class="form-label">Book</label>
                <select name="book_id" id="book_id" class="form-control" required>
                    @foreach($books as $book)
                        <option value="{{ $book->id }}">{{ $book->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="borrow_date" class="form-label">Borrow Date</label>
                <input type="date" name="borrow_date" id="borrow_date" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="return_date" class="form-label">Return Date</label>
                <input type="date" name="return_date" id="return_date" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select name="status" id="status" class="form-control">
                    <option value="0">Borrowed</option>
                    <option value="1">Returned</option>
                </select>
            </div>
            <button type="submit" class="btn btn-success">Save</button>
            <a href="{{ route('borrows.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>
@endsection
