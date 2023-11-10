<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrainingEventModel extends Model
{
    use HasFactory;
    protected $table = 'training_events';

    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }
    public function designation()
    {
        return $this->belongsTo(Designation::class);        
    }
}
