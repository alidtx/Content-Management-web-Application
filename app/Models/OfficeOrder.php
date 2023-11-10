<?php

namespace App\Models;

use App\Services\NocService; 
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OfficeOrder extends Model
{
    use HasFactory;
    
    protected $table = "office_orders";
    Protected $fillable = ['category_type','category_id','member_id', 'title', 'publish_date', 'status', 'attachment'];
}
