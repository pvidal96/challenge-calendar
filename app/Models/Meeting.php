<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Meeting extends Model
{
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'api_id',
        'start',
        'end',
        'changed',
        'title',
    ];

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'user_meetings')->withPivot('accepted');
    }

    public function attendees(): BelongsToMany
    {
        return $this->belongsToMany(Attendee::class, 'meeting_attendees')->withPivot('accepted');
    }
}
