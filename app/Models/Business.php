<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Business extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
<<<<<<< HEAD
=======
        'logo',
>>>>>>> 6a21fed7f7ff83d705f194ef929999fb894554c9
        'name',
        'industry',
        'target',
        'style',
        'color',
        'products',
        'goal',
        'email',
        'template_id',
        'business_detail_id'
    ];

    /**
     * Get the user that owns the business.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the template for the business.
     */
    public function template(): BelongsTo
    {
        return $this->belongsTo(Template::class);
    }

    /**
     * Get the generated site for the business.
     */
    public function generatedSite(): HasOne
    {
        return $this->hasOne(GeneratedSite::class);
    }

    /**
     * Get the products for the business.
     */
    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }

    /**
     * Get the orders for the business.
     */
    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }

    /**
     * Get the business details for the business.
     */
    public function businessDetail(): HasOne
    {
        return $this->hasOne(BusinessDetail::class);
    }

    /**
     * Get the pages for the business.
     */
    public function pages(): HasMany
    {
        return $this->hasMany(Page::class);
    }

    /**
<<<<<<< HEAD
=======
     * Get the website settings for the business.
     */
    public function websiteSettings(): HasOne
    {
        return $this->hasOne(WebsiteSettings::class);
    }

    /**
>>>>>>> 6a21fed7f7ff83d705f194ef929999fb894554c9
     * Get the business's primary color with fallback.
     */
    public function getColorAttribute($value)
    {
        return $value ?: '#3A86FF'; // Default color
    }
<<<<<<< HEAD
=======

    /**
     * Generate API key for the website
     */
    public function generateApiKey()
    {
        $websiteSettings = $this->websiteSettings()->firstOrCreate([]);
        
        // Generate a unique API key
        do {
            $apiKey = 'web_' . bin2hex(random_bytes(16));
        } while (\App\Models\WebsiteSettings::where('api_key', $apiKey)->exists());
        
        $websiteSettings->api_key = $apiKey;
        $websiteSettings->save();
        
        return $apiKey;
    }

    /**
     * Get the API key for this business
     */
    public function getApiKey()
    {
        $websiteSettings = $this->websiteSettings()->firstOrCreate([]);
        
        if (!$websiteSettings->api_key) {
            return $this->generateApiKey();
        }
        
        return $websiteSettings->api_key;
    }

    /**
     * Check if website settings exist and create if not
     */
    public function ensureWebsiteSettings()
    {
        return $this->websiteSettings()->firstOrCreate([]);
    }
>>>>>>> 6a21fed7f7ff83d705f194ef929999fb894554c9
}