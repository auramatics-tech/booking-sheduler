<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentBookingSlot extends Model
{
    protected $table = "student_booking_slots";
    protected $fillable = ['teacher_id', 'student_id', 'slots_id'];
}
