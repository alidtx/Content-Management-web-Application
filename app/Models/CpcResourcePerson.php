<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CpcResourcePerson extends Model
{
    use HasFactory;

    public function getProfile()
    {
        return $this->belongsTo(Profile::class,'profile_id','id');
    }
}
