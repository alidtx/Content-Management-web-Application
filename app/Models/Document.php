<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;
    public function member()
    {
        return $this->belongsTo(Profile::class, 'id', 'id');
    }
}
