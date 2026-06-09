@extends('admin.layouts.admin')

@section('title', 'Edit User')

@section('content')

<div class="form-wrapper">

    <div class="form-header">

        <div class="form-info">

            <h3 class="form-title">
                Edit User
            </h3>

            <div class="breadcrumb">

                <span>
                    <a href="{{ route('admin.dashboard') }}">
                        Dashboard
                    </a>
                </span>

                <span>
                    <i class="fa-solid fa-caret-right"></i>
                </span>

                <span>
                    Edit User
                </span>

            </div>

        </div>

        <div>
            <a href="{{ route('user.index') }}" class="btn-list">
                <i class="fa-solid fa-list"></i>
                User List
            </a>
        </div>

    </div>

    <div class="form-body">

        <form action="{{ route('user.update', $user->id) }}" method="POST">

            @csrf
            @method('PUT')

            <div class="row g-3">

                {{-- Name --}}
                <div class="col-md-6">

                    <div class="form-group">

                        <label>Name</label>

                        <input
                            type="text"
                            name="name"
                            class="form-control @error('name') is-invalid @enderror"
                            placeholder="Enter Name"
                            value="{{ old('name', $user->name) }}"
                        >

                        @error('name')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror

                    </div>

                </div>

                {{-- Email --}}
                <div class="col-md-6">

                    <div class="form-group">

                        <label>Email</label>

                        <input
                            type="email"
                            name="email"
                            class="form-control @error('email') is-invalid @enderror"
                            placeholder="Enter Email"
                            value="{{ old('email', $user->email) }}"
                        >

                        @error('email')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror

                    </div>

                </div>

                {{-- Phone --}}
                <div class="col-md-6">

                    <div class="form-group">

                        <label>Phone Number</label>

                        <input
                            type="text"
                            name="phone"
                            class="form-control @error('phone') is-invalid @enderror"
                            placeholder="Enter Phone Number"
                            value="{{ old('phone', $user->phone) }}"
                        >

                        @error('phone')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror

                    </div>

                </div>

                {{-- Role --}}
                <div class="col-md-6">

                    <div class="form-group">

                        <label>Role</label>

                        <select
                            name="role"
                            class="form-control @error('role') is-invalid @enderror"
                        >

                            <option value="">
                                Select Role
                            </option>

                            <option
                                value="Super Admin"
                                {{ old('role', $user->role) == 'Super Admin' ? 'selected' : '' }}
                            >
                                Super Admin
                            </option>

                            <option
                                value="Admin"
                                {{ old('role', $user->role) == 'Admin' ? 'selected' : '' }}
                            >
                                Admin
                            </option>

                        </select>

                        @error('role')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror

                    </div>

                </div>

                {{-- Password --}}
                <div class="col-md-6">

                    <div class="form-group">

                        <label>Password</label>

                        <input
                            type="password"
                            name="password"
                            class="form-control @error('password') is-invalid @enderror"
                            placeholder="Enter New Password"
                        >

                        @error('password')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror

                        <small class="text-muted">
                            Leave blank if you don't want to change password.
                        </small>

                    </div>

                </div>

                {{-- Submit --}}
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