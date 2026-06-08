@extends('admin.layouts.admin')

@section('title', 'Security')

@section('content')
    <div class="form-wrapper">
        <div class="form-header">
            <div class="form-info">
                <h3 class="form-title">Security</h3>
                <div class="breadcrumb">
                    <span><a href="{{ route('admin.dashboard') }}">Dashboard</a></span>
                    <span><i class="fa-solid fa-caret-right"></i></span>
                    <span>Security</span>
                </div>
            </div>
        </div>

        <div class="form-body">
            <form action="{{ route('user.security.update') }}" method="POST">
                @csrf
                <div class="row g-3">

                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Current Password</label>
                            <input type="password" class="form-control" name="current_password" placeholder="Current Password">
                            @error('current_password')
                                <small class="error-text">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label>New Password</label>
                            <input type="password" class="form-control" name="password" placeholder="New Password">
                            @error('password')
                                <small class="error-text">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Confirm New Password</label>
                            <input type="password" class="form-control" name="confirm_password" placeholder="Confirm New Password">
                            @error('confirm_password')
                                <small class="error-text">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>


                    <div class="col-md-12">
                        <button type="submit" class="btn-submit">
                            Change Password
                        </button>
                    </div>

                </div>
            </form>
        </div>
    </div>
@endsection
