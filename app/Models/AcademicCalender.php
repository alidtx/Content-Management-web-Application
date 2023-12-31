<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AcademicCalender extends Model
{

    public function program()
    {
        return $this->belongsTo(Program::class,'program_id','id');
    }

    public function department()
    {
        return $this->belongsTo(Department::class,'department_id','id');
    }

}
