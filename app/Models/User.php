<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Scout\Searchable;

/**
 * @mixin IdeHelperUser
 */
class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable, Searchable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'selected_organization_id',
        'first_name',
        'last_name',
        'email',
        'phone',
        'avatar',
        'sex',
        'role',
        'google_id',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The relationships that should always be loaded.
     *
     * @var array
     */
    protected $with = ['currentOrganization'];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'phone_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Get the user's first name.
     */
    protected function name(): Attribute
    {
        return Attribute::make(
            get: fn (mixed $value, array $attributes) => "{$attributes['first_name']} {$attributes['last_name']}",
        )->shouldCache();
    }

    public function toSearchableArray()
    {
        return [
            'id' => (int) $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'avatar' => $this->avatar,
            'created_at' => $this->created_at,
        ];
    }

    public function organizationsOwned(): HasMany
    {
        return $this->hasMany(Organization::class);
    }

    public function currentOrganization(): BelongsTo
    {
        return $this->belongsTo(Organization::class, 'selected_organization_id', 'id');
    }

    public function organizationMemberships(): HasMany
    {
        return $this->hasMany(OrganizationMembership::class);
    }

    public function memberOrganizations(): BelongsToMany
    {
        return $this->belongsToMany(
            Organization::class,
            'organization_memberships',
            'user_id',
            'organization_id'
        );
    }

    public function selectedOrganizationMembership(): HasOne
    {
        return $this->hasOne(OrganizationMembership::class, 'user_id', 'id')
            ->where('organization_id', $this->selected_organization_id);
    }

    public function pollingStations(): HasMany
    {
        return $this->hasMany(PollingStation::class, 'user_id', 'id');
    }

    /**
     * Scope a query to only include users of a list of roles.
     */
    public function scopeOfRoles(Builder $query, array $roles): void
    {
        $query->whereIn('role', $roles);
    }

    public function isAnAdmin(): bool
    {
        return in_array($this->role, ['admin', 'super_admin']);
    }

    public function canViewTelescope(): bool
    {
        return $this->isAnAdmin();
    }

    public function canViewHorizon(): bool
    {
        return $this->isAnAdmin();
    }

    public function selectOrganization(int $organizationId)
    {
        $this->selected_organization_id = $organizationId;
        $this->save();
        $this->refresh();

        return $this;
    }

    public function hasSelectedOrganization(): bool
    {
        return $this->selected_organization_id !== null;
    }
}
