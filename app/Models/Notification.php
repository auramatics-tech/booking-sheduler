<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Notification extends Model
{
    protected  $guarded = [];
    protected $casts = [
        'data' => 'array',
    ];
}
