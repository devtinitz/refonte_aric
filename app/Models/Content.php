<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    protected $fillable = ['key', 'type', 'metadata'];

    protected $casts = [
        'metadata' => 'array',
    ];

    public function values()
    {
        return $this->hasMany(ContentValue::class);
    }

    public function publishedValue()
    {
        return $this->hasOne(ContentValue::class)->where('status', 'published')->latest('version_number');
    }

    public function draftValue()
    {
        return $this->hasOne(ContentValue::class)->where('status', 'draft')->latest('version_number');
    }

    public function getCurrentDisplayValueAttribute()
    {
        // Try to get draft first, then fallback to published
        return $this->draftValue ?: $this->publishedValue;
    }
}
