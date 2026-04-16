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
    ];

    public function type() {
        return $this->belongsTo(Type::class, 'type_id');
    }

    public function subtype() {
        return $this->belongsTo(Subtype::class, 'subtype_id');
    }
}
