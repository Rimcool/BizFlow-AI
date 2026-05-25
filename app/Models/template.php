<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Template extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'preview_image',
        'styles',
        'structure',
        'is_active',
        'category'
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    /**
     * Get the businesses using this template.
     */
    public function businesses(): HasMany
    {
        return $this->hasMany(Business::class);
    }

    /**
     * Scope a query to only include active templates.
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope a query to only include templates of a specific category.
     */
    public function scopeByCategory($query, $category)
    {
        return $query->where('category', $category);
    }

    /**
     * Get the URL for the preview image.
     */
    public function getPreviewImageUrlAttribute()
    {
        if ($this->preview_image) {
            return asset('storage/' . $this->preview_image);
        }
        
        return asset('images/default-template.png');
    }

}
