<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        $data['total']= "";
        return view('sell',$data);

    }

    public function sell(Request $r){
        $qty = $r->qty;
        $up = $r->price;
        $name = $r->pname;
        $disc = $r->disc;
        $total = $qty * $up * (1-$disc/100);
        $data ['total']= $total;
        return view('sell',$data);


     }
}
