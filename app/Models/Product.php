<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    protected $fillable = [
        'name',
        'image_url',
        'participant_id',
        'display'
    ];
    public function participant(): BelongsTo
    {
        return $this->belongsTo(Participant::class);
    }
}
