@extends('admin.layouts.admin')

@section('title', 'Add User')

@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <div class="form-wrapper">
        <div class="form-header">
            <div class="form-info">
                <h3 class="form-title">Add User</h3>
                <div class="breadcrumb">
                    <span><a href="{{ route('admin.dashboard') }}">Dashboard</a></span>
                    <span><i class="fa-solid fa-caret-right"></i></span>
                    <span>Add User</span>
                </div>
            </div>
            <div>
                <a href="{{ route('user.index') }}" class="btn-list"><i class="fa-solid fa-list"></i> User List</a>
            </div>
        </div>

        <div class="form-body">
            <form action="{{ route('user.store') }}" method="POST">
                @csrf
                <div class="row g-3">

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" name="name" placeholder="Enter Name">
                            <small class="error-text"></small>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email" placeholder="Enter Email">
                            <small class="error-text"></small>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Phone Number</label>
                            <input type="text" class="form-control" name="phone" placeholder="Enter Phone Number">
                            <small class="error-text"></small>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Role</label>
                            <select class="form-control" name="role">
                                <option value="">Select Role</option>
                                    <option value="Super Admin">Super Admin</option>
                                    <option value="Admin">Admin</option>
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
                            Submit
                        </button>
                    </div>

                </div>
            </form>
        </div>
    </div>
@endsection
