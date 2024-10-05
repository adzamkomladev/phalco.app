<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Ballot extends Model
{
    /** @use HasFactory<\Database\Factories\BallotFactory> */
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'election_id',
        'position',
        'description',
        'code',
        'status',
    ];

    public function election(): BelongsTo
    {
        return $this->belongsTo(Election::class, 'election_id', 'id');
    }

    public function options(): HasMany
    {
        return $this->hasMany(BallotOption::class, 'ballot_id', 'id');
    }
}
