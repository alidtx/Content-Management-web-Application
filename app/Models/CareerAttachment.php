<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CareerAttachment extends Model
{
    use HasFactory;
    protected $fillable = ['career_id','attachment'];
}
