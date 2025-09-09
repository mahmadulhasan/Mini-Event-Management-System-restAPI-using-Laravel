@extends('layout')
@section('content')
    <h1 class="text-center my-4">This is Event page</h1>
    @if (session('success'))
        <div class="alert alert-success text-center">
            {{ session('success') }}
        </div>
    
    @endif
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    
    @endif
    <div class="d-flex flex-wrap justify-content-center gap-4">
        @foreach ($events as $event)
            <div class="card" style="width: 18rem;">
                <img src="{{ asset('storage/' . $event->image) }}" class="card-img-top" alt="event image">
                <div class="card-body text-center">
                    <h5 class="card-title">{{$event->name}}</h5>
                    <p class="card-text">Location: {{$event->location}}</p>
                    <p class="card-text">Date: {{$event->date}}</p>
                    <p class="card-text">Time: {{$event->start_time}} - {{$event->end_time}}</p>
                    <div class="d-flex justify-content-center gap-2">
                        <a href="{{ route('registerevent', $event->id) }}" class="btn btn-primary">Register your self</a>
                        <a href="{{ route('eventattendees', $event->id) }}" class="btn btn-primary">All attendees</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection