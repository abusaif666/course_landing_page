@extends('admin.layouts.auth')

@section('title','Forgot Password')

@section('auth-content')

    <div class="admin_auth_box">
        <div class="admin_auth_icon_box">
            <div class="admin_auth_icon color_bg"><i class="fa-regular fa-envelope"></i></div>
        </div>
        <h2 class="admin_auth_box_title">Forgot Password?</h2>
        <p class="admin_auth_box_subtitle">Enter your email address and we will send a reset code to your email.</p>

        <form class="admin_auth_form" action="{{ route('send.otp') }}" method="POST">
            @csrf
            <!-- Email -->
            <div class="admin_auth_form_group">
                <label>Email</label>
                <input type="email" name="email" placeholder="admin@example.com">
                <i class="fa-regular fa-envelope"></i>
                @error('email')
                    <small>{{ $message }}</small>
                @enderror
            </div>

            <button class="admin_auth_form_submit_btn" type="submit">Send OTP</button>
        </form>
        <div class="admin_auth_box_footer">
            <div class="text">Remember your password? <a href="{{ route('login.page') }}">Login</a></div>
        </div>
    </div>
@endsection
