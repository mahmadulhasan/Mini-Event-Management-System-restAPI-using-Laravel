@extends('layout')
@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Register for Event: {{ $event->name }}</h1>
        <p>date: {{$event->date}}</p>
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
        <form action="{{ route('registereventpost') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <input type="hidden" class="form-control" id="event_id" name="event_id" value="{{ $event->id }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Register</button>
        </form>
@endsection