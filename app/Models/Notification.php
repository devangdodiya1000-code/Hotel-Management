<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $fillable = [
        'name',
        'image',
        'type_id',
        'subtype_id',
        'room_id',
        'status',
    ];

    public function type() {
        return $this->belongsTo(Type::class, 'type_id');
    }

    public function subtype() {
        return $this->belongsTo(Subtype::class, 'subtype_id');
    }

    public function room() {
        return $this->belongsTo(Room::class, 'room_id');
    }
}
