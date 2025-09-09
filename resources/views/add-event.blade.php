@extends('layout')
@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>

@endif
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>

@endif

<div class="container mt-5">
    <h1 class="mb-4">Event Details</h1>
    <form action="{{ route('eventscreate') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Event Title</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Event Image</label>
            <input type="file" class="form-control" id="image" name="image" accept="image/*" required>
        </div>
        <div class="mb-3">
            <label for="date" class="form-label">Event Date</label>
            <input type="date" class="form-control" id="date" name="date" required>
        </div>
        <div class="mb-3">
            <label for="location" class="form-label">Event Location</label>
            <input type="text" class="form-control" id="location" name="location" required>
        </div>
        <div class="mb-3">
            <label for="location" class="form-label">Event Capacity</label>
            <input type="text" class="form-control" id="capacity" name="capacity" required>
        </div>
        <div class="mb-3">
            <label for="location" class="form-label">Start time</label>
            <input type="time" class="form-control" id="start_time" name="start_time" required>
        </div>
        <div class="mb-3">
            <label for="location" class="form-label">End Date</label>
            <input type="time" class="form-control" id="end_time" name="end_time" required>
        </div>

        <button type="submit" class="btn btn-primary">Add Event</button>
    </form>
@endsection