<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegulatoryCommitte extends Model
{
    use HasFactory;
    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }
    public function committeeType()
    {
        return $this->belongsTo(CommitteType::class,'committe_type_id','id');
    }
}
