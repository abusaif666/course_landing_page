<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\AdminPasswordForgetOtpMail;
use App\Models\User;
use App\Models\UserOtp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class ForgetPasswordController extends Controller
{
    public function forgetPasswordPage()
    {
        return view('admin.auth.forget');
    }

    public function sendOtp(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $user = User::where('email', $request->email)->first();

        if (! $user) {
            return back()->with('error', 'Email not found');
        }

        // Forget Mail SMTP Load
        if (! setMailConfig('forget')) {
            return back()->with('error', 'Forget SMTP not configured');
        }

        // পুরাতন OTP Delete
        UserOtp::where('user_id', $user->id)->delete();

        // Generate OTP
        $otp = rand(100000, 999999);

        // Save OTP
        UserOtp::create([
            'user_id' => $user->id,
            'otp' => $otp,
            'expire_at' => now()->addMinutes(10),
        ]);

        try {

            Mail::to($user->email)
                ->send(new AdminPasswordForgetOtpMail($otp));

            session([
                'reset_user_id' => $user->id,
            ]);

            return redirect()
                ->route('otp.verify.page')
                ->with('success', 'OTP sent successfully');

        } catch (\Exception $e) {

            UserOtp::where('user_id', $user->id)->delete();

            return back()->with(
                'error',
                'Mail send failed : '.$e->getMessage()
            );
        }
    }

    public function OtpVerifyPage()
    {
        return view('admin.auth.verify');
    }

    public function verifyOtp(Request $request)
    {
        $request->validate([
            'otp' => 'required|digits:6',
        ]);

        $userId = session('reset_user_id');

        if (! $userId) {
            return redirect()
                ->route('forget.password.page')
                ->with('error', 'Session expired. Please try again.');
        }

        $otpRecord = UserOtp::where('user_id', $userId)
            ->where('otp', $request->otp)
            ->first();

        if (! $otpRecord) {
            return back()->with('error', 'Invalid OTP');
        }

        // OTP Expired Check
        if (now()->gt($otpRecord->expire_at)) {

            UserOtp::where('user_id', $userId)->delete();

            return back()->with('error', 'OTP expired');
        }

        // OTP Verified Session
        session([
            'otp_verified' => true,
        ]);

        return redirect()
            ->route('change.password.page')
            ->with('success', 'OTP verified successfully');
    }

    public function changePasswordPage()
    {
        return view('admin.auth.change-password');
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'password' => 'required|min:8|confirmed',
        ]);

        if (! session()->has('otp_verified')) {
            return redirect()
                ->route('forget.password.page')
                ->with('error', 'Unauthorized access');
        }

        $userId = session('reset_user_id');

        $user = User::find($userId);

        if (! $user) {
            return redirect()
                ->route('forget.password.page')
                ->with('error', 'User not found');
        }

        $user->update([
            'password' => Hash::make($request->password),
        ]);

        // OTP Delete
        UserOtp::where('user_id', $user->id)->delete();

        // Session Clear
        session()->forget([
            'reset_user_id',
            'otp_verified',
        ]);

        return redirect()
            ->route('login')
            ->with('success', 'Password changed successfully');
    }
}
