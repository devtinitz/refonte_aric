<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Expertise extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'icon',
        'image',
        'detail_title',
        'detail_description',
        'detail_image',
        'features',
        'description',
        'link',
        'order',
        'is_active'
    ];

    protected $casts = [
        'features' => 'array',
        'is_active' => 'boolean',
        'order' => 'integer',
    ];
}
