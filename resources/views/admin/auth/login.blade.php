@extends('admin.layouts.auth')

@section('title','Admin Login')

@section('auth-content')
    <div class="admin_auth_box">
        <div class="admin_auth_icon_box">
            <div class="admin_auth_icon"><i class="fa fa-user"></i></div>
        </div>
        <h2 class="admin_auth_box_title">Admin Login</h2>
        <p class="admin_auth_box_subtitle">Sign in to continue to dashboard</p>

        <form class="admin_auth_form" action="{{ route('login') }}" method="POST">
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

            <!-- Password -->
            <div class="admin_auth_form_group">
                <label>Password</label>
                <input type="password" name="password" id="password" placeholder="********">
                <i class="fa-regular fa-eye" id="togglePassword"></i>
                @error('email')
                    <small>{{ $message }}</small>
                @enderror
            </div>

            <div class="admin_auth_after_form_group_text forget">
                <a href="{{ route('forget.password.page') }}">Forgot Password?</a>
            </div>

            <button class="admin_auth_form_submit_btn" type="submit">Login</button>
        </form>

        <div class="admin_auth_box_footer">
            <div class="text">© {{ date('Y') }} Admin Panel. All rights reserved.</div>
        </div>
    </div>
@endsection
