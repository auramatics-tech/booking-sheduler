<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    protected $guarded = [];


    protected $casts = [
        'day_lesson' => 'array'
    ];
}
