@extends('admin.layouts.admin')

@section('title', 'Edit Payment API')

@section('content')

<div class="form-wrapper">

    <div class="form-header">

        <div class="form-info">

            <h3 class="form-title">
                Edit Payment API
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
                    Edit Payment API
                </span>

            </div>

        </div>

        <div>
            <a href="{{ route('payment-api.index') }}" class="btn-list">
                <i class="fa-solid fa-list"></i>
                Payment API List
            </a>
        </div>

    </div>

    <div class="form-body">

        <form action="{{ route('payment-api.update', $paymentApi->id) }}" method="POST">

            @csrf
            @method('PUT')

            <div class="row g-3">

                {{-- Provider Name --}}
                <div class="col-md-6">

                    <div class="form-group">

                        <label>Provider Name</label>

                        <input
                            type="text"
                            name="provider_name"
                            class="form-control @error('provider_name') is-invalid @enderror"
                            value="{{ old('provider_name', $paymentApi->provider_name) }}"
                            placeholder="Enter Provider Name"
                        >

                        @error('provider_name')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror

                    </div>

                </div>

                {{-- API Key --}}
                <div class="col-md-6">

                    <div class="form-group">

                        <label>API Key</label>

                        <input
                            type="text"
                            name="api_key"
                            class="form-control @error('api_key') is-invalid @enderror"
                            value="{{ old('api_key', $paymentApi->api_key) }}"
                            placeholder="Enter API Key"
                        >

                        @error('api_key')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror

                    </div>

                </div>

                {{-- Secret Key --}}
                <div class="col-md-6">

                    <div class="form-group">

                        <label>Secret Key</label>

                        <input
                            type="text"
                            name="secret_key"
                            class="form-control @error('secret_key') is-invalid @enderror"
                            value="{{ old('secret_key', $paymentApi->secret_key) }}"
                            placeholder="Enter Secret Key"
                        >

                        @error('secret_key')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror

                    </div>

                </div>

                {{-- Status --}}
                <div class="col-md-6">

                    <div class="form-group">

                        <label>Status</label>

                        <select
                            name="status"
                            class="form-control @error('status') is-invalid @enderror"
                        >

                            <option value="">
                                Select Status
                            </option>

                            <option
                                value="Active"
                                {{ old('status', $paymentApi->status) == 'Active' ? 'selected' : '' }}
                            >
                                Active
                            </option>

                            <option
                                value="Inactive"
                                {{ old('status', $paymentApi->status) == 'Inactive' ? 'selected' : '' }}
                            >
                                Inactive
                            </option>

                        </select>

                        @error('status')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror

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