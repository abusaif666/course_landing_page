@extends('admin.layouts.auth')

@section('title','Verify OTP')

@section('auth-content')

    <div class="admin_auth_box">
        <div class="admin_auth_icon_box">
            <div class="admin_auth_icon color_bg"><i class="fa-solid fa-shield-halved"></i></div>
        </div>
        <h2 class="admin_auth_box_title">Verify OTP</h2>
        <p class="admin_auth_box_subtitle">Enter the 6-digit code sent to your email.</p>

        <form class="admin_auth_form" action="{{ route('verify.otp') }}" method="POST">
            @csrf
            <!-- otp -->
            <div class="admin_auth_form_group">
                <label>OTP Code</label>
                <input type="text" name="otp" placeholder="Enter OTP code">
                <i class="fa-solid fa-key"></i>
                @error('otp')
                    <small>{{ $message }}</small>
                @enderror
            </div>

            <button class="admin_auth_form_submit_btn" type="submit">Verify OTP</button>
        </form>

        <div class="admin_auth_box_footer">
            <div class="text"><a href="{{ route('login.page') }}">Back to Login</a></div>
        </div>
    </div>

@endsection
