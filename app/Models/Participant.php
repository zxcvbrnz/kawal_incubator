<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Participant extends Model
{
    use HasFactory;
    protected $fillable = [
        'business_name',
        'owner_name',
        'contact',
        'business_field',
        'province',
        'city',
        'district',
        'village',
        'address_detail',
        'postal_code',
        'omset',
        'market_reach',
        'ig',
        'tiktok',
        'fb',
        'website',
        'wa',
        'legalitas',
        'legalitas_other',
        'certification',
        'certification_other',
        'has_incubated',
        'incubation_institution',
        'incubation_start',
        'incubation_end',
        'description',
        'profile_photo',
        'business_profile_file',
        'status',
        'display',
    ];

    /**
     * Casting tipe data agar otomatis dikonversi oleh Laravel
     */
    protected $casts = [
        'has_incubated' => 'boolean',
        'incubation_start' => 'date',
        'incubation_end' => 'date',
    ];

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}