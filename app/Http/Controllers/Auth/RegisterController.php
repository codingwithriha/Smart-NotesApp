<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;  // For password hashing
use Illuminate\Support\Facades\Auth;  // For logging the user in

class RegisterController extends Controller
{
    // -------------------------------------------------------
    // Show the registration form
    // Route: GET /register
    // -------------------------------------------------------
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    // -------------------------------------------------------
    // Handle the registration form submission
    // Route: POST /register
    // -------------------------------------------------------
    public function register(Request $request)
    {
        // Step 1: Validate all incoming fields
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email', // email must be unique
            'password' => 'required|string|min:8|confirmed',   // confirmed = password_confirmation field must match
        ]);

        // Step 2: Create the new user in the database
        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password), // never store plain text passwords!
        ]);

        // Step 3: Log the user in automatically after registering
        Auth::login($user);

        // Step 4: Redirect to notes page with a success message
        return redirect()->route('notes.index')->with('success', 'Account created! Welcome to Smart Notes 🎉');
    }
}