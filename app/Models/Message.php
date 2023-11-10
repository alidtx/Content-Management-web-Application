<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;
    protected $table = "messages";   

    Protected $fillable = ['type_id', 'category_id', 'profile_id', 'title_first_part', 'short_description', 'long_description', 'status'];

    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }

    public function faculty()
    {
        return $this->belongsTo(Faculty::class, 'category_id', 'id');
    }
    public function department()
    {
        return $this->belongsTo(Department::class, 'category_id', 'id');
    }
    public function office()
    {
        return $this->belongsTo(Office::class, 'category_id', 'id');
    }
    public function hall()
    {
        return $this->belongsTo(Hall::class, 'category_id', 'id');
    }
}
