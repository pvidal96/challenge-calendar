<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class User extends Model
{
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'email',
        'first_name',
        'last_name',
        'company_id',
        'calendar_token',
        'last_calendar_check',
    ];

    public function meetings(): BelongsToMany
    {
        return $this->belongsToMany(Meeting::class, 'user_meetings')->withPivot('accepted');
    }
}
