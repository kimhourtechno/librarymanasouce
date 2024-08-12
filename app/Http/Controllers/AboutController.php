<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index(){

        // // $company = 'Hi this is the testing';
        // return view('about', compact('company'));

        $data ['com'] = 'this is company';
        $data ['coment'] = 'this is comment';
        $data ['content'] = 'this is content';
        return view('about',$data);
    }
}
