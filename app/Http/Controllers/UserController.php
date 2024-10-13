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
    public function edit($id){
        $user = User::findOrFail($id); // Find the user by ID
        return view('user.useredit', compact('user'));

    }
    public function update(Request $request, $id){

        $user = User::findOrFail($id);

        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:15', // Adjust max length as per your requirements
            'email' => 'required|email|max:255|unique:users,email,' . $id,
            'gender' => 'required|string|in:M,F',
            'role' => 'required|string|in:admin,user',
            'place_of_birth' => 'required|string|max:255', // Add validation for place_of_birth

            'password' => 'nullable|string|min:8|confirmed', // Password is optional, but if provided, must be confirmed
        ]);

        // Update the user's information
        $user->name = $validatedData['name'];
        $user->phone = $validatedData['phone'];
        $user->place_of_birth = $validatedData['place_of_birth'];
        $user->email = $validatedData['email'];
        $user->gender = $validatedData['gender'];
        $user->role = $validatedData['role'];

        // Update password if it was provided
        if ($request->filled('password')) {
            $user->password = Hash::make($validatedData['password']);
        }


        // Save the updated user information
        $user->save();

        // Redirect back to a desired route with a success message
        return redirect()->route('user.index')->with('success', 'User updated successfully.');

    }
    public function delete($id)
    {
        $user = User::findOrFail($id);
        // $user->action = 0;  // Set action to 0 to deactivate the user
        $user->action = $user->action == 1 ? 0 : 1;

        $user->save();

        return redirect()->route('user.index')->with('success', 'User deactivated successfully.');
    }




}
