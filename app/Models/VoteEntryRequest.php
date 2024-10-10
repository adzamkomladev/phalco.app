<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class VoteEntryRequest extends Model
{
    /** @use HasFactory<\Database\Factories\VoteEntryRequestFactory> */
    use HasFactory;


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'election_id',
        'polling_station_id',
        'ballot_id',
        'status',
    ];

    public function election(): BelongsTo
    {
        return $this->belongsTo(Election::class);
    }

    public function pollingStation(): BelongsTo
    {
        return $this->belongsTo(PollingStation::class);
    }

    public function ballot(): BelongsTo
    {
        return $this->belongsTo(Ballot::class);
    }

    public function submittedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function histories(): HasMany
    {
        return $this->hasMany(VoteEntryRequestHistory::class, 'vote_entry_request_id', 'id');
    }

    public function files(): HasMany
    {
        return $this->hasMany(VoteEntryFile::class, 'vote_entry_request_id', 'id');
    }

    public function entries(): HasMany
    {
        return $this->hasMany(VoteEntry::class, 'vote_entry_request_id', 'id');
    }
}
