<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JournalPaper extends Model
{
    use HasFactory;
    protected $table = 'journal_papers';

    protected $fillable = ['paper_title', 'journal_for', 'ref_id','description', 'authors', 'editor', 'issn', 'research_area', 'volume', 'issue', 'attachment1', 'attachment2', 'date'];
    
    public function department(){
        return $this->belongsTo(Department::class, 'ref_id', 'id');
    }
}
