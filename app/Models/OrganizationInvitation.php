<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class OrganizationInvitation extends Model
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
        'email',
        'status',
        'role',
        'expires_at',
        'token'
    ];

    public function scopeOfRoles(Builder $query, array $roles): void
    {
        $query->whereIn('role', $roles);
    }

    public function scopePending(Builder $query): void
    {
        $query->where('status', 'pending');
    }

    public function scopeRejected(Builder $query): void
    {
        $query->where('status', 'rejected');
    }

    public function accept()
    {
        $this->status = 'accepted';
        $this->save();
        return $this;
    }
}
