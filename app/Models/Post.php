<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    protected $fillable = [
        'title',
        'news_content',
        'author',
    ];

    public function writer(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author', 'id');
    }
}
