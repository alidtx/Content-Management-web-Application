<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model; 

class LandingModal extends Model
{ 	 

    protected $table = "landing_modals";    

    Protected $fillable = ['name','description','use_for', 'faculty_id', 'department_id', 'status'];
}
