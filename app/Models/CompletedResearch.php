<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompletedResearch extends Model
{
    // Protected $table = "completed_researches";
    Protected $fillable = ['title','profile_id','research_for', 'description', 'author','journal_name','publish_status','image', 'pdf' ,'date','year','journal_index','journal_category','url'];

    public function profile()
    {
        return $this->belongsTo(Profile::class,'profile_id');
    }

}
