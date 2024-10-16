<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @mixin IdeHelperVoteEntryFile
 */
class VoteEntryFile extends Model
{
    /** @use HasFactory<\Database\Factories\VoteEntryFileFactory> */
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'vote_entry_request_id',
        'url',
    ];

    public function request(): BelongsTo
    {
        return $this->belongsTo(VoteEntryRequest::class, 'vote_entry_request_id', 'id');
    }
}
