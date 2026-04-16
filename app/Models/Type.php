<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    //
    protected $fillable = [
        'image',
        'name',
        'status',
    ];

    public function subtypes()
    {
        return $this->hasMany(Subtype::class, 'type_id');
    }

    public function rooms() {
        return $this->hasMany(Room::class, 'type_id');
    }
}
