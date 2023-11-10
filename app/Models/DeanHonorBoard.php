<?php

namespace App\Models;

use App\Services\DeanHonorBoardService; 
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeanHonorBoard extends Model
{
    protected $table = "dean_honor_boards";    

    protected $fillable = ['name', 'image', 'faculty_id', 'department_id','designation', 'start_date', 'end_date'];
}
