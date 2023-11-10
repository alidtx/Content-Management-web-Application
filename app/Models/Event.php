<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $casts = [
        'faculty_id' => 'array',
        'department_id' => 'array',
    ];

    // protected $filable = ['event_for','title','description','location','start_date','end_date','visible','show_on_homepage'];
}
