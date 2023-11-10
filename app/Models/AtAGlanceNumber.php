<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AtAGlanceNumber extends Model
{
    use HasFactory;
    protected $fillable = ['student_number','faculty_member_number','office_staff_number','member_number'];
}
