<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = "news";
    protected $fillable = ['title','short_description','long_description','image','file','type','date','start_date','end_date','display_on_scrollbar','faculty_id','department_id','office_id','club_id','cpc_id','author'];

    public function cpc()
    {
        return $this->belongsTo(Cpc::class);
    }
}
