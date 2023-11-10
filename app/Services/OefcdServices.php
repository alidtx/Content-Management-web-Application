<?php

namespace App\Services;

use App\Models\OefcdFacultyDevelopmentProgram;
use App\Models\TrainingModel; //oefcd training
use App\Models\AboutInternationalAffair;  
use App\Models\Profile;
/**
 * Class OefcdServices
 * @package App\Services
 */
class OefcdServices
{
    //////
    public function getby()
    {
        $data = OefcdFacultyDevelopmentProgram::first();
        return $data;

    }
    public static function getAll()
    {
        $data = TrainingModel::all(); 
        return $data;

    }
    public static function getByID($id)
    { 
        $data = AboutInternationalAffair::find($id); 
        return $data;

    }
}
