<?php

namespace App\Http\Controllers;

use App\Models\Admin; // Ensure this model exists
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Show the login form
    public function showLoginForm()
    {
        return view('admin.login'); 
    }

    // Handle login request
    public function login(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'password' => 'required|string',
        ]);

        // Check if admin exists
        $admin = Admin::where('name', $request->name)->first();

        if ($admin && Hash::check($request->password, $admin->password)) {
            // Login admin and redirect to index
            session(['admin_logged_in' => true]); 
            return redirect()->route('admin.index');
        }

        return redirect()->back()->withErrors(['message' => 'Invalid credentials']);
    }

  
    public function logout(Request $request)
    {
        $request->session()->forget('admin_logged_in'); 
        return redirect()->route('admin.login');
    }
}
