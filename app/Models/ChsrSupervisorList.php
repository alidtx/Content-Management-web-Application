<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChsrSupervisorList extends Model
{
    use HasFactory;

    public function profile()
    {
        return $this->belongsTo(Profile::class,'profile_id');
    }
    public function program_category()
    {
        return $this->belongsTo(ProgramCategory::class);
    }
}
