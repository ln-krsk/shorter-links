<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RequestAnalytics extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function links(): BelongsTo
    {
        return $this->belongsTo(Link::class, 'link_id');
    }
}
