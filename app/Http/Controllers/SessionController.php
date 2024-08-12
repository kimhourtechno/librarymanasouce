<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function test(){
        $id = session()->getId() ;
        return $id;
    }
}
