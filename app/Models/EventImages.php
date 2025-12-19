<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EventImages extends Model
{
    protected $fillable = [
        'event_id',
        'image_url',
        'image_description',
    ];
    public function participant(): BelongsTo
    {
        return $this->belongsTo(Event::class);
    }
}
