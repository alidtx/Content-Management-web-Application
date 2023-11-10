<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProgramInfo extends Model
{

    protected $fillable = ['program_id','department_id','name','short_name', 'sort_order'];

    public function department_name()
    {
        return $this->belongsTo(Department::class,'department_id', 'id', 'short_order');
    }

    public function program_category()
    {
        return $this->belongsTo(Program::class,'program_id', 'id');
    }


}
