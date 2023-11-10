<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hall extends Model
{
    use HasFactory;

    public function slider()
    {
        return $this->belongsTo(SliderMaster::class,'slider_master_id','id');
    }

    public function provostProfile()
    {
        return $this->belongsTo(Profile::class,'provost','id');
    }

}
