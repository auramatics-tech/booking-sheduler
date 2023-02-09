<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    //students

    protected $fillable = [
        'title', 'start', 'end', 'students', 'user_id', 'description', 'day_lesson', 'teacher_avraible'
    ];
    protected $casts = [
        'students' => 'array',
        'day_lesson' => 'array',
        'teacher_avraible' => 'array'

    ];


    public function teacher()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function student()
    {
        return $this->belongsTo('App\User', 'students');
    }
}
