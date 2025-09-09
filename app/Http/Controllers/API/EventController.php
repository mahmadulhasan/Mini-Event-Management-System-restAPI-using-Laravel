<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::all()->where('event_date', '>=', now()->toDateString());
        if($events->isEmpty()){
            return response()->json(['message' => 'No events found'], 404);
        }
        return response()->json(['events' => $events], 200);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'event_date' => 'required|date',
            'location' => 'required|string|max:255',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
            'capacity' => 'required|integer|min:1',
        ]);

        $event = Event::create($validated);

        return response()->json(['message' => 'Event created successfully', 'event' => $event], 201);
    }
}
