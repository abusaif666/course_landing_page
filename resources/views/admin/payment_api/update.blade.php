@extends('admin.layouts.admin')

@section('title', 'Edit Payment API')

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
                <h3 class="form-title">Edit Payment API</h3>
                <div class="breadcrumb">
                    <span><a href="{{ route('admin.dashboard') }}">Dashboard</a></span>
                    <span><i class="fa-solid fa-caret-right"></i></span>
                    <span>Edit Payment API</span>
                </div>
            </div>
            <div>
                <a href="{{ route('payment-api.index') }}" class="btn-list"><i class="fa-solid fa-list"></i> Payment API List</a>
            </div>
        </div>

        <div class="form-body">
            <form action="{{ route('payment-api.update', $paymentApi->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row g-3">

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Provider Name</label>
                            <input type="text" class="form-control" name="provider_name" value="{{ old('provider_name', $paymentApi->provider_name) }}" placeholder="Enter Provider Name">
                            <small class="error-text"></small>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>API Key</label>
                            <input type="text" class="form-control" name="api_key" value="{{ old('api_key', $paymentApi->api_key) }}" placeholder="Enter API Key">
                            <small class="error-text"></small>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Secret Key</label>
                            <input type="text" class="form-control" name="secret_key" value="{{ old('secret_key', $paymentApi->secret_key) }}" placeholder="Enter Secret Key">
                            <small class="error-text"></small>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Status</label>
                            <select class="form-control" name="status">
                                <option value="">Select Status</option>
                                <option value="Active" {{ old('status', $paymentApi->status) == 'Active' ? 'selected' : '' }}>Active</option>
                                <option value="Inactive" {{ old('status', $paymentApi->status) == 'Inactive' ? 'selected' : '' }}>Inactive</option>
                            </select>
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
