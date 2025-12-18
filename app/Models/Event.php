<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $casts = [
        'start_at' => 'datetime',
    ];

    protected $fillable = [
        'name',
        'description',
        'start_at',
        'location'
    ];
}
