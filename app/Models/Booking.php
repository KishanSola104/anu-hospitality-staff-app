class Booking extends Model
{
    protected $fillable = [
        'user_id',
        'postcode',
        'bedrooms',
        'bathrooms',
        'extras',
        'has_pets',
        'hours',
        'full_name',
        'address',
        'city',
        'address_postcode',
        'mobile',
        'alt_mobile',
        'instructions',
        'preferred_date',
        'arrival_window',
        'access_method',
        'base_price',
        'discount',
        'total_price',
        'payment_status',
        'stripe_session_id',
        'stripe_payment_intent'
    ];

    protected $casts = [
        'extras' => 'array',
        'has_pets' => 'boolean',
        'preferred_date' => 'date'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
