<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AvailableTime extends Model
{
    protected $fillable = [
        'booking', 'start', 'end', 'students', 'user_id', 'description', 'time'
    ];
    //     protected $casts = [
    //         'students' => 'array'
    //     ];
    protected $dates = ['created_at', 'updated_at', 'start', 'end'];

    public function student()
    {
        return $this->belongsTo('App\User', 'students');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
