<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Contact extends Model
{
    /** @use HasFactory<\Database\Factories\ContactFactory> */
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'audience_id',
        'first_name',
        'last_name',
        'other_names',
        'gender',
        'date_of_birth',
        'avatar',
        'email',
        'phone',
        'address',
        'city',
        'state',
        'country',
    ];

    /**
     * Get the user that created the Contact
     */
    public function createdBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    /**
     * The audience that owns the Contact
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function audience()
    {
        return $this->belongsTo(Audience::class);
    }
}
