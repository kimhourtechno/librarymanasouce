<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class RegionController extends Controller
{
    public function index(){
        // $rg = DB::select('select * from regions order by id DESC');

        // $rg = DB::select("select regions.name, count(customer.id) as
        // total from customer inner join regions on customer.region_id
        // = regions.id group by regions.id, regions.name");

        $rg = DB::table("customer")
            ->join('regions', 'customer.region_id', 'regions.id')
            ->select('regions.name',DB::raw("count(customer.id) as total"))
            ->groupBy('regions.name')
            ->get();

        return view('regions.index', compact('rg'));
    }
}
