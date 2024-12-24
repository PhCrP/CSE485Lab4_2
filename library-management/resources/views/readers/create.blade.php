@extends('layouts.App')

@section('content')
<div class="card">
    <div class="card-header">
        <h3>Add New Reader</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('readers.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="birthday" class="form-label">Birthday</label>
                <input type="date" name="birthday" id="birthday" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <input type="text" name="address" id="address" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Phone</label>
                <input type="text" name="phone" id="phone" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success">Save</button>
            <a href="{{ route('readers.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>
@endsection
