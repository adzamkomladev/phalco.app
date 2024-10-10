<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class VoteEntry extends Model
{
    /** @use HasFactory<\Database\Factories\VoteEntryFactory> */
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'vote_entry_request_id',
        'ballot_option_id',
        'votes',
    ];

    public function request(): BelongsTo
    {
        return $this->belongsTo(VoteEntryRequest::class, 'vote_entry_request_id', 'id');
    }

    public function ballotOption(): BelongsTo
    {
        return $this->belongsTo(BallotOption::class);
    }
}
