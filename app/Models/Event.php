<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Event extends Model
{
    protected $casts = [
        'start_at' => 'datetime',
        'end_at' => 'datetime',
        'status' => 'boolean',
    ];

    protected $fillable = [
        'name',
        'description',
        'slug',
        'start_at',
        'end_at',
        'image_url',
        'location',
        'status',
    ];

    public function images(): HasMany
    {
        return $this->hasMany(EventImages::class);
    }
}