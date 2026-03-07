<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeneratedSite extends Model
{
    use HasFactory;

    protected $fillable = [
        'business_id',
        'site_url',
        'seo_plan',
        'marketing_plan',
        'management_tips',
        'chatbot_details',
    ];

    /**
     * Get the business that owns the generated site.
     */
    public function business()
    {
        return $this->belongsTo(Business::class, 'business_id');
    }
}