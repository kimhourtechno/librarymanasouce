<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Session;1

class UploadController extends Controller
{
    public function index(){
        return view('upload');
    }
    public function save(Request $r){

        $files = $r->file('photo');

        //$file = $r->file('photo')->store('uploads','custom');
        if($r->photo){

            foreach($files as $file){
                $file->store('uploads', 'custom');
            }
            // $file = $r->file('photo')->store('uploads','custom');
            // return redirect('upload')->with('success', 'File uploaded successfully.');

            // session()->flash('success', 'File uploaded successfully.');
            // return redirect('upload'); when use this code this we should use namespace "use Session" on the block namespace note 1


        }
        else{
            return redirect('upload')->with('error','Please Sellect File');
        }

    }
}
