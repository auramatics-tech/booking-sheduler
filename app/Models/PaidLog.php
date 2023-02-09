<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaidLog extends Model
{
    //
    protected $fillable = ['status', 'date', 'user_id', 'price'];
}
