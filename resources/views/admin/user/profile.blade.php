@extends('admin.layouts.admin')

@section('title', 'Profile')

@section('content')
    <div class="form-wrapper">
        <div class="form-header">
            <div class="form-info">
                <h3 class="form-title">Profile</h3>
                <div class="breadcrumb">
                    <span><a href="{{ route('admin.dashboard') }}">Dashboard</a></span>
                    <span><i class="fa-solid fa-caret-right"></i></span>
                    <span>Profile</span>
                </div>
            </div>
        </div>

        <div class="form-body">
            <form action="{{ route('user.profile.update') }}" method="POST">
                @csrf
                <div class="row g-3">

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" name="name" value="{{ $user->name }}" placeholder="Enter Name">
                            <small class="error-text"></small>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email" value="{{ $user->email }}" placeholder="Enter Email">
                            <small class="error-text"></small>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Phone Number</label>
                            <input type="text" class="form-control" name="phone" value="{{ $user->phone }}" placeholder="Enter Phone Number">
                            <small class="error-text"></small>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <button type="submit" class="btn-submit">
                            Update
                        </button>
                    </div>

                </div>
            </form>
        </div>
    </div>
@endsection
