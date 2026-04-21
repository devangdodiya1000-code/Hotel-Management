<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'room_id',
        'customer_name',
        'email',
        'payment_intent_id',
        'payment_status',
        'amount',
        'check_in',
        'check_out',
    ];
}
