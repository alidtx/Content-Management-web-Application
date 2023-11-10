<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Faculty extends Model
{
    use HasFactory;
    // use SoftDeletes;

    protected $fillable = ['name','ucam_faculty_id','about','profile_id','slider_id','location','contact','sort_order','status','image'];

    public function profile()
    {
        return $this->belongsTo(Profile::class, 'profile_id', 'id');
    }

    public function department()
    {
        return $this->hasMany(Department::class,'faculty_id','id');
    }

    public function slider()
    {
        return $this->hasMany(Slider::class, 'slider_master_id','slider_id');
    }

}
