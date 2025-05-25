<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// app/Models/Order.php
class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'product_details',
        'total_price',
        'status',
        'shipping_address',
        'phone_number',
        'payment_method'
    ];

    protected $casts = [
        'product_details' => 'array',
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Accessor untuk format total harga
    public function getFormattedTotalAttribute()
    {
        return 'Rp ' . number_format($this->total_price, 0, ',', '.');
    }
}