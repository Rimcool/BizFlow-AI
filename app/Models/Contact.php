<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'business_id',
        'name',
        'email',
        'subject',
        'message'
    ];

    public function business()
    {
        return $this->belongsTo(Business::class);
    }
}