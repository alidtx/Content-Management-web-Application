<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RouteTime extends Model
{
    use HasFactory;
    protected $table = 'route_times';

    protected $fillable = ['start_time', 'end_time', 'route_way', 'transport_id'];

    protected $hidden = ['transport_id'];

    public function transport()
    {
        return $this->belongsTo(Transport::class);
    }
}