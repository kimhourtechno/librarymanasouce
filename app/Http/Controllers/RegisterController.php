<?php

namespace App\Http\Controllers;

use Faker\Guesser\Name;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
  public function save(Request $r){
    dd($r->all());
    // $name = $r->name;
    // $phone = $r->Phone_Number;
    // $email = $r->Address_Student;

    // echo $name . ", " . $phone . ", " . $email . ",";

    //$data = $r->all();
    //$data = $r->input('name','phone');
    // $data =$r->except('_token', 'name');
    // dd($data);
  }
}
