<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VideoPelajaran extends Model
{
    protected $fillable = [
        'judul',
        'type',
        'link_video',
        'deskripsi'
    ];

    public function getYoutubeIdAttribute()
    {
        preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $this->link_video, $match);
        return $match[1] ?? null;
    }
}