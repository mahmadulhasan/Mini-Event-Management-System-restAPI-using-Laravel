<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $fillable = ['id','name', 'event_date', 'location', 'start_time', 'end_time', 'capacity'];

    function attendees()
    {
        return $this->hasMany(EventAttendee::class);
    }
}
