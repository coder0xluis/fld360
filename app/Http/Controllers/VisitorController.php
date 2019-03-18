<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use PragmaRX\Tracker\Tracker;
use Ramsey\Uuid\Uuid;


class VisitorController extends Controller
{
    /*
     * 访问频率限制
     * */


    public function test($promoter = '')
    {
        $fingerprint = \request()->fingerprint();
        echo 'hello visitor ' . $promoter . ' : ' . $fingerprint;
        echo '<br>';
        $uuid= Uuid::uuid4();
        echo str_random(40);
        dd($uuid,$uuid->getHex());
    }


    public function test1($promoter=''){
        echo \request()->fingerprint();
    }
}



