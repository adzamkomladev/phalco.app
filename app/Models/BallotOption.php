<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @mixin IdeHelperBallotOption
 */
class BallotOption extends Model
{
    /** @use HasFactory<\Database\Factories\BallotOptionFactory> */
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'ballot_id',
        'name',
        'order',
        'status',
    ];

    public function ballot(): BelongsTo
    {
        return $this->belongsTo(Ballot::class, 'ballot_id', 'id');
    }

    public function votes(): HasMany
    {
        return $this->hasMany(Vote::class);
    }
}
