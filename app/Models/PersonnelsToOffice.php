<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonnelsToOffice extends Model
{
    use HasFactory;

    protected $fillable = ['profile_id','office_id','status'];

    public function profile()
    {
        return $this->belongsTo(Profile::class,'profile_id','id');
    }

    public function office()
    {
        return $this->belongsTo(Office::class,'office_id','ucam_office_id');
    }
}
