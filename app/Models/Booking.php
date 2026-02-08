<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',

        // Service info
        'postcode',
        'bedrooms',
        'bathrooms',
        'extras',
        'has_pets',
        'hours',

        // Address
        'full_name',
        'address',
        'city',
        'address_postcode',
        'mobile',
        'alt_mobile',
        'instructions',

        // Schedule
        'preferred_date',
        'arrival_window',
        'access_method',

        // Cleaning materials
        'cleaning_materials',
        'materials_charge',

        // Pricing
        'base_price',
        'discount',
        'total_price',

        // Payment
        'payment_status',
        'stripe_session_id',
        'stripe_payment_intent',
    ];

    protected $casts = [
        'extras' => 'array',
        'has_pets' => 'boolean',
        'preferred_date' => 'date',
        'base_price' => 'decimal:2',
        'materials_charge' => 'decimal:2',
        'discount' => 'decimal:2',
        'total_price' => 'decimal:2',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
