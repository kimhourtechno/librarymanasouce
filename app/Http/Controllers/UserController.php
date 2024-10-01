<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
// use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
// use Auth;


class UserController extends Controller
{
    public function __construct()
    {
        // Apply the auth middleware to all actions
        $this->middleware('auth');

        // Apply the admin middleware to specific actions
        $this->middleware('admin')->only(['index', 'show', 'edit', 'update', 'destroy']);
    }
    public function index(){
        // Fetch all users from the User model
        $users = User::all();
        // Pass the users data to the view
        return view('user.userlistv', ['users' => $users]);
    }
    public function create(){
        return view('user.useraddv');
    }
    public function store(Request $r)
    {/// Validate the request data


        // Create a new user
        $user = new User();
        $user->name = $r->name;
        $user->phone = $r->phone;
        $user->gender = $r->gender;
        $user->place_of_birth = $r->place_of_birth;
        $user->email = $r->email;
        $user->password = Hash::make($r->password); // Hash the password
        $user->role = $r->role;
        $user->save();

        // Redirect to the user index page with a success message
        return redirect()->route('user.index')->with('success', 'User created successfully.');
    }
    public function edit(){
        return view('user.useredit');

    }

    

    // public function store(Request $r){
    //     $r->validate([
    //         'name' => 'required|string|max:255',
    //         'phone' => 'required|string|max:15',
    //         'email' => 'required|string|email|max:255|unique:users',
    //         'password' => 'required|string|min:8|confirmed',
    //         'place_of_birth' => 'required|string|max:255',
    //         'gender' => 'required|string|in:M,F',
    //         'role' => 'required|string|in:admin,user',
    //     ]);

    //     $data = array(
    //         'name'=>$r->name,
    //         'phone'=>$r->phone,
    //         'email'=>$r->email,
    //         'password'=> bcrypt($r->password),
    //         'place_of_birth'=> $r->place_of_birth,
    //         'gender'=> $r->gender,
    //         'role'=> $r->role
    //     );
    //     $i = DB::table('users')->insert($data);
    //     if(!$i){
    //         return redirect('user/create')
    //         ->with('success','data has been saved');
    //     }
    //     else{
    //         return redirect('user/create')
    //         ->with('error','Fail to save data');
    //     }
    // }

}
