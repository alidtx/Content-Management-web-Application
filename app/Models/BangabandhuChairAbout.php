<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BangabandhuChairAbout extends Model
{
    use HasFactory;

    protected $fillable = ['profile_id', 'message', 'slider_id'];
    
    public function profile()
    {
        return $this->belongsTo(Profile::class,'profile_id');
    }
}
