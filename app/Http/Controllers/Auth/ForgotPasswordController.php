<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;

class ForgotPasswordController extends Controller
{
    public function viewForgotPassword()
    {
        return view('auth.passwords.forgot-password');
    }
    
    public function updateResetPassword(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email|exists:users,email',
            'current_password' => 'required|string|min:8|current_password',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::where('email', $validated['email'])->first();

        if (!Hash::check($validated['old_password'], $user->password)) {
            return redirect()->back()->withErrors(['old_password' => 'The old password is incorrect.']);
        }

        $resetToken = Str::random(60);

        $user->update([
            'password' => Hash::make($validated['password']),
            'reset_token' => $resetToken,
            'reset_token_created_at' => now(),
        ]);

        return redirect()->route('login.view')->with('success', 'Password has been successfully updated.');
    }
}



