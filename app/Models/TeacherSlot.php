<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TeacherSlot extends Model
{
    protected $fillable = [
        'teacher_id', 'start', 'end', 'time'
    ];
    protected $dates = ['created_at', 'updated_at', 'start', 'end'];
}
