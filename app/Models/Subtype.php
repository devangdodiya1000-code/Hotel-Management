<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subtype extends Model
{
     protected $fillable = [
        'image',
        'name',
        'type_id',
        'status',
    ];

    public function type()
    {
        return $this->belongsTo(Type::class, 'type_id');
    }

    public function rooms()
    {
        return $this->hasMany(Room::class, 'subtype_id');
    }

    public function notifications() {
        return $this->hasMany(Notification::class, 'subtype_id');
    }
}
