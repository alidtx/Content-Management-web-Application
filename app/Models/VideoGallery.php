<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class VideoGallery extends Model
{
    Protected $fillable = ['title','description','youtube_link','publish_date','is_featured'];
}
