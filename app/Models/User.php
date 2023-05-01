<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
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

    /**
     * Gets the meetings given an interval
     */
    public function getMeetings($from = "", $to = ""): Collection
    {
        $query = $this->meetings();

        if ($from) {
            $query->where('start', '>', $from);
        }

        if ($to) {
            $query->where('start', '<', $to);
        }

        return $query->orderBy('start', 'DESC')->get();
    }
}
