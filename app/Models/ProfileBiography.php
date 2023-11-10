<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfileBiography extends Model
{
    use HasFactory;
    Protected $fillable = ['profile_id','Biography'];
}
