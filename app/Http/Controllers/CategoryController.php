<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cats = DB::table('categories')
        ->where('active', 1)
        ->paginate(config('app.row'));
        return view('categories.index', compact('cats'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = array(
            'name' => $request->name

        );
        $i = DB::table('categories')->insert($data);
        if($i){
            session()->flash('success','Data has been saved');
            return redirect()->route('category.create');
        }
        else{
            session()->flash('error', 'Fail to save data!');
            return redirect('category/create')->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $cat = DB::table('categories')->find($id);
        return view('categories.edit', compact('cat'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = array(
            'name' => $request->name

        );
        $i = DB::table('categories')
            ->where('id',$id)
            ->update($data);
        if($i){
            session()->flash('success','Data has been saved');
            return redirect('category');
        }
        else{
            session()->flash('error', 'Fail to save data!');
            return redirect()->route('category.edit');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        DB::table('categories')
        ->where('id',$id)
        ->update(['active' => 0]);
        return redirect()->route('category.index')
                ->with('success', 'Data has been removed');
    }
}
