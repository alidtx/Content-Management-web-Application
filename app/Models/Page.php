<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $table = 'pages';
    protected $guarded = [];

    public function menu_type()
    {
        return $this->belongsTo(MenuType::class,'type');
    }
}
