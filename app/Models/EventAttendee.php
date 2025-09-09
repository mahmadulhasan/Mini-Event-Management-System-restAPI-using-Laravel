<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventAttendee extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'event_id', 'email', 'name'];

    function event()
    {
        return $this->belongsTo(Event::class);
    }
}
