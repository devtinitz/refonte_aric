<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobOffer extends Model
{
    protected $fillable = [
        'title',
        'category',
        'contract_type',
        'experience',
        'location',
        'tags',
        'icon',
        'is_active',
        'order'
    ];

    protected $casts = [
        'tags' => 'array',
        'is_active' => 'boolean',
    ];
}
