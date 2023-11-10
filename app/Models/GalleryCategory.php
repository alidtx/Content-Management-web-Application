<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GalleryCategory extends Model
{
    Protected $fillable = ['name','sub_category','sort','status'];
}
