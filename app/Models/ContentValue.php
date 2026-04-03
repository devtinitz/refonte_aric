<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContentValue extends Model
{
    protected $fillable = ['content_id', 'value', 'status', 'version_number', 'user_id'];

    public function content()
    {
        return $this->belongsTo(Content::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
