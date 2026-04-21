<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = [
        'image',
        'name',
        'type_id',
        'subtype_id',
        'status',
        'price',
    ];

    public function type() {
        return $this->belongsTo(Type::class, 'type_id');
    }

    public function subtype() {
        return $this->belongsTo(Subtype::class, 'subtype_id');
    }

    public function notifications() {
        return $this->hasMany(Notification::class, 'room_id');
    }

    //for payments
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
