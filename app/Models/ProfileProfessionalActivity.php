<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfileProfessionalActivity extends Model
{
    use HasFactory;
    Protected $fillable = ['profile_id','TotalProfessionalActivity','ProfessionalActivity'];
}
