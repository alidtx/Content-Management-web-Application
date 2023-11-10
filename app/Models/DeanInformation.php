<?php

namespace App\Models;

use App\Services\DeanInformationService; 
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeanInformation extends Model
{
    protected $table = "dean_informations";    

    protected $fillable = ['name', 'image', 'banner', 'faculty_id', 'department_id', 'department_id', 'email',
'designation', 'rank', 'facebook', 'twitter', 'linkedin', '', 'phone', 'appointment_type', 'website', 
'details_education', 'experience', 'publications', 'status'];
}
