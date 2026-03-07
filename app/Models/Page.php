<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Page extends Model
{
    use HasFactory;

    protected $fillable = [
        'business_id',
        'title',
        'slug',
        'content',
        'order',
        'published'
    ];

    public function business(): BelongsTo
    {
        return $this->belongsTo(Business::class);
    }
}