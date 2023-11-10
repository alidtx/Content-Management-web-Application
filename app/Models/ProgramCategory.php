<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramCategory extends Model
{
    use HasFactory;

    protected $fillable = ['program_category','ucam_program_category_id'];

    public function program()
    {
        return $this->hasMany(Program::class,  'program_category_id','id');
    }


}
