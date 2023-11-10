<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    protected $fillable = ['faculty_id','department_id','office_id','bup_no','nameEn','nameBn','email','designation','phone','mobile','blood_group','rank','appointment_type','detail_education','experience','photo_path','personnel_type'];

    public function faculty()
    {
        // return $this->hasOne(Faculty::class, 'profile_id', 'id');
    }

   

}
