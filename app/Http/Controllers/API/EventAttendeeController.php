<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\EventAttendee;
use Illuminate\Http\Request;

class EventAttendeeController extends Controller
{
    public function register(Request $request, $event_id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
        ]);

        // Check if event exists
        $event = Event::find($event_id);
        if (!$event) {
            return response()->json(['message' => 'Event not found'], 404);
        }

        // Check if event capacity is reached
        if ($event->attendees()->count() >= $event->capacity) {
            return response()->json(['message' => 'Event capacity reached'], 400);
        }

        $checkeamil = EventAttendee::where('event_id', $event_id)->where('email', $validated['email'])->first();
        if($checkeamil){
            return response()->json(['message' => 'You have already registered for this event'], 400);
        }

        // Register attendee
        $attendee = EventAttendee::create([
            'event_id' => $event_id,
            'name' => $validated['name'],
            'email' => $validated['email'],
        ]);

        return response()->json(['message' => 'Registration successful', 'attendee' => $attendee], 201);
    }

    public function attendees($event_id)
    {
        // Check if event exists
        $event = Event::find($event_id);
        if (!$event) {
            return response()->json(['message' => 'Event not found'], 404);
        }

        // Get attendees
        $attendees = $event->attendees;

        return response()->json(['attendees' => $attendees], 200);
    }
}
