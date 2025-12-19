<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Event extends Model
{
    protected $casts = [
        'start_at' => 'datetime',
    ];

    protected $fillable = [
        'name',
        'description',
        'start_at',
        'end_at',
        'location',
        'status',
    ];

    public function images(): HasMany
    {
        return $this->hasMany(EventImages::class);
    }
}
