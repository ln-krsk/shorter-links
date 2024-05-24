<?php

namespace App\Models;

use Chiiya\FilamentAccessControl\Models\FilamentUser;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends FilamentUser
{
    public function links(): HasMany
    {
        return $this->hasMany(Link::class, 'created_by');
    }
}
