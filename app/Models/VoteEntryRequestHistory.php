<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class VoteEntryRequestHistory extends Model
{
    /** @use HasFactory<\Database\Factories\VoteEntryRequestHistoryFactory> */
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'vote_entry_request_id',
        'user_id',
        'status',
        'comment',
        'ended_at',
    ];

    public function createdBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function request(): BelongsTo
    {
        return $this->belongsTo(VoteEntryRequest::class, 'vote_entry_request_id', 'id');
    }
}
