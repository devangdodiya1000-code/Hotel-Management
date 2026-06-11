<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    //
    Protected $fillable = [
        'name',
        'image',
        'description',
        'status',
    ];
}
