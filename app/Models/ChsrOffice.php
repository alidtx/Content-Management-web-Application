<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChsrOffice extends Model
{
    use HasFactory;

    public function profile()
    {
        return $this->belongsTo(Profile::class,'profile_id');
    }
    public function designations()
    {
        return $this->belongsTo(Designation::class,'designation_id');
    }
}
