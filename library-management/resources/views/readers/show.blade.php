@extends('layouts.App')

@section('content')
<div class="card">
    <div class="card-header">
        <h3>Reader Details</h3>
    </div>
    <div class="card-body">
        <p><strong>Name:</strong> {{ $reader->name }}</p>
        <p><strong>Birthday:</strong> {{ $reader->birthday }}</p>
        <p><strong>Address:</strong> {{ $reader->address }}</p>
        <p><strong>Phone:</strong> {{ $reader->phone }}</p>
        <a href="{{ route('readers.index') }}" class="btn btn-secondary">Back</a>
    </div>
</div>
@endsection
