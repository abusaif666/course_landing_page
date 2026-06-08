@extends('admin.layouts.auth')

@section('title','Reset Password')

@section('auth-content')
    <div class="admin_auth_box">
                <div class="admin_auth_icon_box">
            <div class="admin_auth_icon color_bg"><i class="fa-solid fa-unlock-keyhole"></i></div>
        </div>
<h2 class="admin_auth_box_title">Reset Password</h2>
<p class="admin_auth_box_subtitle">Enter your new password to complete reset process.</p>

        <form class="admin_auth_form" action="{{ route('change.password') }}" method="POST">
            @csrf

            <div class="admin_auth_form_group">
                <label>New Password</label>
                <input type="password" name="password" placeholder="Enter new password">
                @error('password')
                    <small>{{ $message }}</small>
                @enderror
            </div>


            <div class="admin_auth_form_group">
                <label>Confirm Password</label>
                <input type="text" name="password_confirmation" placeholder="Confirm Password">
                @error('password_confirmation')
                    <small>{{ $message }}</small>
                @enderror
            </div>

            <button class="admin_auth_form_submit_btn" type="submit">Forget Password</button>
        </form>

                <div class="admin_auth_box_footer">
            <div class="text"><a href="{{ route('login.page') }}">Back to Login</a></div>
        </div>
    </div>
@endsection
