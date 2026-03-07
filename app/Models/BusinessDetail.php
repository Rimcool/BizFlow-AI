<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BusinessDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'business_id',
        'seo_plan',
        'marketing_plan',
        'management_tips',
        'chatbot_prompt'
    ];

    public function business(): BelongsTo
    {
        return $this->belongsTo(Business::class);
    }
}