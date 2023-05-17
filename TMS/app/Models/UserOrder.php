<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserOrder extends Model
{
    
    use HasFactory;
    // public $timestamps = false;

    protected $table = 'users_order';

    protected $fillable = [
        'id',
        'load_id',
        'user_id',
        'origin_phone',
        'destination_phone',
        'origin_address',
        'origin_city',
        'origin_state',
        'origin_zipcode',
        'destination_address',
        'destination_city',
        'destination_state',
        'destination_zipcode',
        'vehicle_maker',
        'vehicle_model',
        'vehicle_type',
        'vehicle_year',
        'vehicle_plate',
        'customer_pickup_time',
        'customer_instruction',
        'created_at',
        'updated_at',
        'price_quote',
        'progress_status',
        'payment_progress_status',
        'price_quote_status',
    ];
}
