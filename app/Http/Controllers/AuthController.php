<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class AuthController extends Controller
{

    //
    public function showLoginForm()
    {
        return view('auth.login');
    }
    public function login(Request $request)
    {
         // Validate input data
    $request->validate([
        'email' => 'required|email',
        'password' => 'required|string',
    ]);

    $credentials = $request->only('email', 'password');

    // Attempt to log in
    if (Auth::attempt($credentials)) {
        // Retrieve the authenticated user
        $user = Auth::user();

        // Check if the user is deactivated (action = 0)
        if ($user->action == 0) {
            // Log the user out immediately
            Auth::logout();

            // Return error message
            return back()->withErrors([
                'email' => 'Your account has been deactivated. Please contact the administrator.',
            ])->onlyInput('email');
        }

        // If user is active, redirect to intended page
        return redirect()->intended('student'); // Adjust the redirect URL as needed
    }

    // If credentials do not match, return an error message
    return back()->withErrors([
        'email' => 'The provided credentials do not match our records.',
    ])->onlyInput('email');
        // $request->validate([
        //     'email' => 'required|email',
        //     'password' => 'required|string',
        // ]);

        // $credentials = $request->only('email', 'password');

        // if (Auth::attempt($credentials)) {
        //     return redirect()->intended('student'); // Adjust the redirect URL as needed
        // }

        // return back()->withErrors([
        //     'email' => 'The provided credentials do not match our records.',
        // ])->onlyInput('email');
    }
    public function logout()
    {
        Auth::logout();
        return redirect('login');
    }
}
