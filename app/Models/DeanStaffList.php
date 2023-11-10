<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeanStaffList extends Model
{
    use HasFactory;

    protected $table = "dean_staff_lists";    

    protected $fillable = ['name', 'image', 'dean_information_id', 'email',
'designation', 'rank', 'facebook', 'twitter', 'linkedin', 'phone', 'appointment_type', 'website', 
'details_education', 'experience', 'publications'];
}
