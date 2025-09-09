<?php

use App\Http\Controllers\API\EventAttendeeController;
use App\Http\Controllers\API\EventController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');


Route::post('/events', [EventController::class, 'store']);
Route::get('/events', [EventController::class, 'index']);

Route::post('/events/{event_id}/register', [EventAttendeeController::class, 'register']);
Route::get('/events/{event_id}/attendees', [EventAttendeeController::class, 'attendees']);