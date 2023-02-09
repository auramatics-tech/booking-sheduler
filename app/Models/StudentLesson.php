<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentLesson extends Model
{
    protected $table = "student_lessons";
    protected $fillable = ['user_id', 'teacher_id', 'student_id', 'lesson_id'];
}
