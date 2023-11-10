<?php

namespace App\Services;

use App\Models\AppConfig;
use Illuminate\Http\Request;

/**
 * Class TypeService
 * @package App\Services
 */
class TypeService
{
    public function typeList($name)
    {
        $val = AppConfig::where('item', $name)->first();
        $data = json_decode($val->value);
        return $data;
    }

    

}
