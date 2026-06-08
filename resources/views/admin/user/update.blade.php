@extends('admin.layouts.admin')

@section('title', 'Edit User')

@section('content')
    <div class="form-wrapper">
        <div class="form-header">
            <div class="form-info">
                <h3 class="form-title">Edit User</h3>
                <div class="breadcrumb">
                    <span><a href="{{ route('admin.dashboard') }}">Dashboard</a></span>
                    <span><i class="fa-solid fa-caret-right"></i></span>
                    <span>Edit User</span>
                </div>
            </div>
            <div>
                <a href="{{ route('user.index') }}" class="btn-list"><i class="fa-solid fa-list"></i> User List</a>
            </div>
        </div>

        <div class="form-body">
            <form action="{{ route('user.update', $user->id) }}" method="POST">
                @csrf
                <div class="row g-3">

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" name="name" value="{{ $user->name }}"
                                placeholder="Enter Name">
                            <small class="error-text"></small>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" value="{{ $user->email }}" name="email"
                                placeholder="Enter Email">
                            <small class="error-text"></small>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Phone Number</label>
                            <input type="text" class="form-control" name="phone" value="{{ $user->phone }}"
                                placeholder="Enter Phone Number">
                            <small class="error-text"></small>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Role</label>
                            <select class="form-control" name="role">
                                <option {{ $user->role == 'Super Admin' ? 'selected' : '' }} value="Super Admin">Super Admin</option>
                                <option {{ $user->role == 'Admin' ? 'selected' : '' }} value="Admin">Admin</option>
                            </select>
                            <small class="error-text"></small>
                        </div>
                    </div>


                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" name="password" placeholder="Enter Password">
                            <small class="error-text password_error"></small>
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
