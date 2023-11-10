<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Transport extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'transports';

    protected $fillable = [ 'route_title', 'start_point', 'end_point', 'transport_up_root', 'transport_down_root'];

    public function route_schedule()
    {
        return $this->hasMany(RouteTime::class);
    }
    public function up()
    {
        return $this->hasMany(RouteTime::class)->where('route_way', 1);
    }
    public function down()
    {
        return $this->hasMany(RouteTime::class)->where('route_way', 2);
    }
}