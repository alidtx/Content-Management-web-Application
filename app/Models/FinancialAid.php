<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class FinancialAid extends Model
{

    protected $table = "financial_aids";    

    Protected $fillable = ['how_aid_works','type_of_aids','policies_and_procedures','aid_file'];
}
