<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Role extends Model
{
    public $timestamps = false;

    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }

    public function label(): string
    {
        return match ($this->name) {
            'reader' => 'Читатель',
            'journalist' => 'Журналист',
            'admin' => 'Администратор',
        };
    }
}
