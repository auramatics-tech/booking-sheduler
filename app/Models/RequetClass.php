<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RequetClass extends Model
{
    // requet_classes

    protected $table = "request_classes";

    protected $fillable = [
        'user_id', 'name', 'age', 'experience_class', 'date_class', 'available_time', 'coupon_code', 'introduction'
    ];
}
