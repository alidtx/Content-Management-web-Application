<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HallMember extends Model
{
    use HasFactory;

    public function profile()
    {
        return $this->belongsTo(Profile::class,'member_id','id');
    }

    public function hall()
    {
        return $this->belongsTo(Hall::class,'hall_id','id');
    }
}
