<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function viewLogin()
    {
        if (Auth::check()) {
            return redirect()->route('dashboard');
        }
    
        return view('auth.login');
    }

    public function checkLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        $remember = $request->has('remember');

        if (Auth::attempt($credentials, $remember)) {
            return redirect()->intended('dashboard')->with('success', 'Logged in successfully.');
        }

        return back()->withErrors(['email' => 'Invalid credentials.']);
    }

    public function checkLogout(Request $request)
    {        
        if (Auth::check()) {
            $user = Auth::user();
            if ($user instanceof User) {
                $user->update(['remember_token' => null]);
            } else {
                dd('Not an instance of User:', $user);
            }
    
        } else {
            return redirect('/')->with('error', 'Please log in first.');
        }
        
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        $request->session()->flush();

        return redirect('/')->with('success', 'Logged out successfully.');
    }
}
