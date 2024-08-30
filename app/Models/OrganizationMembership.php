<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @mixin IdeHelperOrganizationMembership
 */
class OrganizationMembership extends Model
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
        'organization_role_id',
        'status',
        'roleTitle'
    ];

    protected $with = ['role'];


    public function role(): BelongsTo
    {
        return $this->belongsTo(OrganizationRole::class, 'organization_role_id', 'id');
    }

    public function scopeActive(Builder $query): void
    {
        $query->where('status', 'active');
    }
}
