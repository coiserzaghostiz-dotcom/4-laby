<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $fillable = ['login', 'password'];

    protected $hidden = ['password'];

    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class);
    }

    public function texts(): HasMany
    {
        return $this->hasMany(Text::class);
    }
}
