<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Vote extends Model
{
    /** @use HasFactory<\Database\Factories\VoteFactory> */
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'ballot_id',
        'ballot_option_id',
        'polling_station_id',
        'voter_id',
        'user_id'
    ];

    public function voter(): BelongsTo
    {
        return $this->belongsTo(Voter::class);
    }

    public function createdBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function pollingStation(): BelongsTo
    {
        return $this->belongsTo(PollingStation::class);
    }

    public function ballot(): BelongsTo
    {
        return $this->belongsTo(Ballot::class);
    }

    public function ballotOption(): BelongsTo
    {
        return $this->belongsTo(BallotOption::class);
    }
}
