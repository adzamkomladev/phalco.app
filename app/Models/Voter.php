<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Voter extends Model
{
    /** @use HasFactory<\Database\Factories\VoterFactory> */
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'election_id',
        'polling_station_id',
        'name',
        'username',
        'password',
        'email',
        'phone'
    ];

    public function votes(): HasMany
    {
        return $this->hasMany(Vote::class);
    }

    public function pollingStation(): BelongsTo
    {
        return $this->belongsTo(PollingStation::class);
    }

    public function election(): BelongsTo
    {
        return $this->belongsTo(Election::class);
    }
}
