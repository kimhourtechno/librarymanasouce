<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
//use DB;


use function Laravel\Prompts\table;

class CustomerController extends Controller
{
    public function index1(){
        if(session('user')==null)
        {
            return redirect('login');
        }

        $data ['customers'] = DB::table('customer')

        //write follow or
        // ->where('gender','F')
        // ->orWhere('name','Sok')
        //write follow array and
        // ->where([
        //     ['active','=','1'],
        //     ['gender','M']
        // ])
            //show by write
        //  ->where('active', '=', 1)
        //  ->where('gender','F')
        // ->orderBy('name','desc')
        ///join
        ->leftJoin('regions','customer.region_id','regions.id')
        ->where('customer.active','1')
        ->select('customer.*','regions.name as gname')
        // ->join('regions','customer.region_id','regions.id')
        // ->where('customer.active',1)
        // ->select('customer.*','regions.name as gname')


        ->paginate(config('app.row'));
        $data ['q'] ="";
        $data ['total'] = DB::table('customer')
            ->where('active',1)
            ->count();
        $data ['Male'] = DB::table('customer')
        ->where('active',1)
        ->where('gender','M')
        ->count();
        $data ['Femal'] = DB::table('customer')
        ->where('active',1)
        ->where('gender','F')
        ->count();
         return view('customers.index',$data );


        // $customers = DB::table('customer')->get();
        // return view('your_view_name', ['customers' => $customers]);

        // $data ['customers'] = DB::table('customer')
        //     ->get();
        // return view('customers.index',$data );

        // $data ['customers'] = DB::table('customer')
        // ->paginate(2);
        //  return view('customers.index',$data );

        // $data ['customers'] = DB::table('customer')
        // ->paginate(config('app.row'));
        //  return view('customers.index',$data );


        //  $customers = DB::table('customer')->paginate(2);
        //  return view('customers.index', ['customers' => $customers]);


    }
    public function search(Request $r){

        $q= $r->q;
        $data ['q'] = $q;
        $data ['customers'] = DB::table('customer')
        ->where('active', '=', 1)
        ->where(function($query) use($q){
            $query = $query->orwhere('name','like',"%{$q}%")
            ->orwhere('email','like',"%{$q}%")
            ->orwhere('phone','like',"%{$q}%")
            ->orwhere('adress','like',"%{$q}%");
        })
       ->paginate(config('app.row'));

        return view('customers.index',$data );

    }
    public function create(){
        $data['regions'] = DB::table('regions')->get();
        return view('customers.create',$data);
        //return redirect()->route('customer.create');

    }
    public function save(Request $r){
        // $data = $r->except('_token');
        // dd($data);
        $data = array(
            'name' => $r->name,
            'gender'=> $r->gender,
            'email'=> $r->email,
            'phone'=> $r->phone,
            'adress'=> $r->address
        );
        if($r->photo){
            $data['photo'] = $r->file('photo')->store('uploads/customers', 'custom');
        }
        $i = DB::table('customer')->insert($data);
        if($i){
            //return redirect()->route('customer.index');
            return redirect('customer/create')
            ->with('success','Data has been saved!');
        }else{
            return redirect('customer/create')
            ->with('error','Fail to save!');

        }
    }
    public function delete($id) {
         $i = DB::table('customer')
        ->where('id', $id)
         // ->where('active', '=', 1)
        ->update(['active' => 0]);
          //->where('active', '=', 1);
       // ->delete();
        return redirect('customer')->with('success', 'Data has been removed');
    }
    public function edit($id){
        $customer =DB::table('customer')->find($id);
        return view('customers.edit',compact('customer'));

    }
    public function update(Request $r){
       //$data = $r->except('_token','id','photo');
       $data = array(
        'name' => $r->name,
        'gender'=> $r->gender,
        'email'=> $r->email,
        'phone'=> $r->phone,
        'adress'=> $r->address
        );
        if($r->photo){
            $data['photo'] = $r->file('photo')->store('uploads/customers', 'custom');
        }
        $i = DB::table('customer')
        ->where('id',$r->id)
        ->update($data);
        if($i){
            //return redirect()->route('customer.index');
            return redirect('customer/edit/'.$r->id)
            ->with('success','Data has been saved!');
        }else{
            return redirect('customer/edit'.$r->id)
            ->with('error','Fail to save!');

        }
    }

}
