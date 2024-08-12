<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomemenuController extends Controller
{

    public function index(){
        if(session('user')==null)
        {
            return redirect('login');
        }

        return view('home');
    }
}
