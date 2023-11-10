<?php

$url = 'http://api.bup.edu.bd/api';

return [
    'program_api' => $url . '/FacultyProgramInfo',
    'chsr' => 27,
    'category' => [
        ['id'=>1, 'name'=>'Faculty'],
        ['id'=>2, 'name'=>'Department'],
        ['id'=>3, 'name'=>'Program'],
        ['id'=>4, 'name'=>'CHSR'],
        ['id'=>5, 'name'=>'CPC'],
        ['id'=>6, 'name'=>'IQAC'],
        ['id'=>7, 'name'=>'Office'],
        ['id'=>8, 'name'=>'Hall'],
    ],
    'inner_banner' =>[
        ["id" => 1, "name"=> "Main Page Banner"], 
        ["id" => 2, "name" => "Faculty Inner Banner 1"], 
        ["id" => 3, "name" => "Faculty Inner Banner 2"], 
        ["id" => 4, "name" => "Faculty Inner Banner 3"], 
        ["id" => 5, "name" => "Department Inner Banner 1"], 
        ["id" => 6, "name" => "Department Inner Banner 2"], 
        ["id" => 7, "name" => "Department Inner Banner 3"], 
        ["id" => 8, "name" => "OEFCD Inner Banner"], 
        ["id" => 9, "name" => "CHSR Inner Banner"], 
        ["id" => 10, "name" => "CPC Inner Banner"], 
        ["id" => 11, "name" => "IQAC Inner Banner"], 
        ["id" => 12, "name" => "Office Inner Banner"], 
        ["id" => 13, "name" => "Hall Inner Banner"],
        ["id" => 14, "name" => "Main Footer Banner"],
    ],
];


// config('configure.chsr');



