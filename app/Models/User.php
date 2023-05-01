<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
        'calendar_token',
        'last_calendar_check',
    ];

    public function meetings(): HasMany
    {
        return $this->hasMany(Meeting::class, 'user_meetings');
    }
}
