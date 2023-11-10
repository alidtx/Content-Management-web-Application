<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Newsletter extends Model
{
    use HasFactory;
    protected $table = "newsletters";   

    Protected $fillable = ['name', ' issue_no ', 'image', 'attachment', 'publish_date'];
}
