<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SecurityController extends Controller
{
    public function securityPage()
    {
        return view('admin.user.security');
    }


    public function securityUpdate(Request $request)
{
    $request->validate([
        'current_password' => 'required',
        'password' => 'required|min:8|same:confirm_password',
        'confirm_password' => 'required',
    ]);

    $user = Auth::user();

    // Current password check
    if (!Hash::check($request->current_password, $user->password)) {
        return back()->with('error', 'Current password is incorrect');
    }

    // Same password check
    if (Hash::check($request->password, $user->password)) {
        return back()->with('error', 'New password cannot be same as old password');
    }

    try {

        $user->update([
            'password' => Hash::make($request->password),
        ]);

        // Logout after password change
        Auth::logout();

        // Session clear
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()
            ->route('login')
            ->with('success', 'Password changed successfully. Please login again.');

    } catch (\Exception $e) {

        return back()->with('error', 'Something went wrong');

    }
}
}
