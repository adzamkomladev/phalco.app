<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @mixin IdeHelperElectionStage
 */
class ElectionStage extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'elections_id',
        'user_id',
        'end',
        'start',
        'stage',
        'reason',
    ];

    public function election(): BelongsTo
    {
        return $this->belongsTo(Election::class);
    }

    public function updatedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
