@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Borrows</h1>
    <a href="{{ route('borrows.create') }}" class="btn btn-primary mb-3">Add New Borrow</a>

    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>NO</th>
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
                <td>{{ $loop->iteration + ($borrows->currentPage() - 1) * $borrows->perPage() }}</td>
                <td>{{ $borrow->reader->name }}</td>
                <td>{{ $borrow->book->name }}</td>
                <td>{{ $borrow->borrow_date }}</td>
                <td>{{ $borrow->return_date }}</td>
                <td>{{ $borrow->status ? 'Returned' : 'Borrowed' }}</td>
                <td>
                    <a href="{{ route('borrows.show', $borrow->id) }}" class="btn btn-info btn-sm">View</a>
                    <a href="{{ route('borrows.edit', $borrow->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal" data-task-id="{{ $borrow->id }}">
                        Delete
                    </button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="d-flex justify-content-center">
        @if($borrows->lastPage() > 1)
        {{ $borrows->links() }}
        @else
        <div class="pagination">
            <span class="page-link disabled">1</span>
        </div>
        @endif
    </div>
</div>

<div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmDeleteModalLabel">Confirm deletion</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete this borrow?
            </div>
            <div class="modal-footer">
                <form id="deleteForm" method="POST" action="{{ route('borrows.destroy', ':id') }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const deleteModal = document.getElementById('confirmDeleteModal');
        deleteModal.addEventListener('show.bs.modal', function(event) {
            const button = event.relatedTarget; // Nút bấm mở modal
            const borrowId = button.getAttribute('data-task-id');
            const form = document.getElementById('deleteForm');

            // Thay thế ':id' trong URL bằng ID thực tế
            const action = form.action.replace(':id', borrowId);
            form.action = action;
        });
    });
</script>

@endsection