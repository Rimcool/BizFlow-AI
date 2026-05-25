<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'payment_id',
        'payment_method',
        'amount',
        'currency',
        'status',
        'customer_info',
        'payment_details',
        'completed_at',
    ];

    // Each payment belongs to a business
    public function business()
    {
        return $this->belongsTo(Business::class);
    }

    // Optional: if you tie payments to orders
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
