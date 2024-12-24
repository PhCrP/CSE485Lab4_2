@extends('layouts.App')

@section('content')
<div class="card">
    <div class="card-header">
        <h3>Borrowed Books</h3>
        <a href="{{ route('borrows.create') }}" class="btn btn-primary">Add New Borrow</a>
    </div>
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Reader</th>
                    <th>Book</th>
                    <th>Borrow Date</th>
                    <th>Return Date</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($borrows as $borrow)
                <tr>
                    <td>{{ $borrow->id }}</td>
                    <td>{{ $borrow->reader->name }}</td>
                    <td>{{ $borrow->book->name }}</td>
                    <td>{{ $borrow->borrow_date }}</td>
                    <td>{{ $borrow->return_date }}</td>
                    <td>{{ $borrow->status ? 'Returned' : 'Borrowed' }}</td>
                    <td>
                        <a href="{{ route('borrows.show', $borrow->id) }}" class="btn btn-info btn-sm">View</a>
                        <a href="{{ route('borrows.edit', $borrow->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('borrows.destroy', $borrow->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
