<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //


//     protected $redirectTo = '/admin/dashboard'; // In AdminAuthController

// protected $redirectTo = '/student/dashboard'; // In StudentAuthController

// protected $redirectTo = '/college/dashboard'; // In CollegeAuthController

    // public function authenticate(Request $request)
    // {
    //     $credentials = $request->only('email', 'password');

    //     if (Auth::guard('admin')->attempt(['email' => $credentials['email'], 'password' => $credentials['password'], 'user_type' => 'admin'])) {
    //         // Authentication passed for an admin user
    //         return redirect()->intended('/admin/dashboard');
    //     }

    //     // Authentication failed
    //     return redirect()->route('admin.login')->with('error', 'Invalid credentials');
    // }

    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $credentials['user_type'] = 'admin'; // Set the user_type

        if (Auth::guard('admin')->attempt($credentials)) {
            // Authentication successful for an admin user
            return redirect()->intended('/admin/dashboard');
        }

        // Authentication failed
        return redirect()->route('admin.login')->with('error', 'Invalid credentials');
    }

}
