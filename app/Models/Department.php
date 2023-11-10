<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $fillable = ['name','ucam_department_id','about','profile_id','slider_id','location','contact','sort_order','status'];

    public function faculty()
    {
        return $this->belongsTo(Faculty::class);
    }

    public function Profile()
    {
        return $this->belongsTo(Profile::class);
    }

}
