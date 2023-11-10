<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfileMembership extends Model
{
    use HasFactory;
    Protected $fillable = ['profile_id','TotalMembership','Membership'];
}
