<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Election extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'organization_id',
        'user_id',
        'name',
        'logo',
        'description',
        'start',
        'end',
        'status'
    ];


    public function organization(): BelongsTo
    {
        return $this->belongsTo(Organization::class);
    }

    public function createdBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function activities(): HasMany
    {
        return $this->hasMany(ElectionActivity::class, 'election_id', 'id')->latest();
    }

    public function stages(): HasMany
    {
        return $this->hasMany(ElectionStage::class, 'election_id', 'id')->latest();
    }
}
