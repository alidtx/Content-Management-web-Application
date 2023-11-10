<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpecialAchievement extends Model
{
    use HasFactory;

    protected $fillable = ['title','category','date','short_description','long_description','image'];
}
