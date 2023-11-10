<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfileResearchGate extends Model
{
    use HasFactory;
    Protected $fillable = ['profile_id','TotalResearchGate','ResearchGate'];
}
