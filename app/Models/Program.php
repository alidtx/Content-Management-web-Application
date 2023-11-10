<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;

    protected $fillable = [
        'program_category_id',
        'faculty_id',
        'department_id',
        'program_title',
        'ucam_program_id',
        'admission_criteria',
        'outline',
        'general_guidline',
        'course_list',
        'slider_id',
        'is_admission',
        'admission_start_date',
        'admission_end_date',
        'image'
    ];

    public function program_category(){
        return $this->belongsTo(ProgramCategory::class);
    }

    public function department(){
        return $this->belongsTo(Department::class);
    }

    public function faculty(){
        return $this->belongsTo(Faculty::class);
    }
}
