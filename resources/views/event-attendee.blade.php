@extends('layout')
@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Event Attendees</h1>
    @if ($attendees->isEmpty())
        <p>No attendees found for this event.</p>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>  
                    </tr>
            </thead>
            <tbody>
                @foreach ($attendees as $attendee)
                    <tr>
                        <td>{{ $attendee->name }}</td>
                        <td>{{ $attendee->email }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $attendees->links() }} <!-- Pagination links -->
    @endif
</div>
@endsection