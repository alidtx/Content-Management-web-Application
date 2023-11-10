<?php

namespace App\Models;

use App\Services\MagazineService; 
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Magazine extends Model
{
    use HasFactory;
    protected $table = "magazines";    

    Protected $fillable = ['name', 'image', 'attachment', 'publish_date'];

}
