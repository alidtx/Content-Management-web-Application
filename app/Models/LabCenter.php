<?php

namespace App\Models;

use App\Services\LabCenterService; 
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LabCenter extends Model
{
    use SoftDeletes;

    protected $table = "lab_centers";    

    Protected $fillable = ['title','description','gallery_id','department_id', 'faculty_id', 'status'];

    protected $dates = ['deleted_at'];
    
    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id', 'id');
    }
    public function faculty()
    {
        return $this->belongsTo(Faculty::class, 'faculty_id', 'id');
    }
}
