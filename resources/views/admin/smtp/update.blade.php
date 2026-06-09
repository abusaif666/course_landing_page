@extends('admin.layouts.admin')

@section('title', 'Edit SMTP')

@section('content')

<div class="form-wrapper">

    <div class="form-header">

        <div class="form-info">

            <h3 class="form-title">
                Edit SMTP
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
                    Edit SMTP
                </span>

            </div>

        </div>

        <div>
            <a href="{{ route('smtp.index') }}" class="btn-list">
                <i class="fa-solid fa-list"></i>
                SMTP List
            </a>
        </div>

    </div>

    <div class="form-body">

        <form action="{{ route('smtp.update', $smtp->id) }}" method="POST">

            @csrf

            <div class="row g-3">

                {{-- Mail Type --}}
                <div class="col-md-6">

                    <div class="form-group">

                        <label>Mail Type</label>

                        <select
                            name="mail_type"
                            class="form-control @error('mail_type') is-invalid @enderror"
                        >

                            <option value="">
                                Select
                            </option>

                            <option
                                value="default"
                                {{ old('mail_type', $smtp->mail_type) == 'default' ? 'selected' : '' }}
                            >
                                Default
                            </option>

                            <option
                                value="order"
                                {{ old('mail_type', $smtp->mail_type) == 'order' ? 'selected' : '' }}
                            >
                                Order
                            </option>

                            <option
                                value="payment"
                                {{ old('mail_type', $smtp->mail_type) == 'payment' ? 'selected' : '' }}
                            >
                                Payment Status
                            </option>

                            <option
                                value="forget"
                                {{ old('mail_type', $smtp->mail_type) == 'forget' ? 'selected' : '' }}
                            >
                                Forget Password
                            </option>

                        </select>

                        @error('mail_type')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror

                    </div>

                </div>

                {{-- Mail Mailer --}}
                <div class="col-md-6">

                    <div class="form-group">

                        <label>Mail Mailer</label>

                        <input
                            type="text"
                            name="mail_mailer"
                            class="form-control @error('mail_mailer') is-invalid @enderror"
                            value="{{ old('mail_mailer', $smtp->mail_mailer) }}"
                            placeholder="Enter Mail Mailer"
                        >

                        @error('mail_mailer')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror

                    </div>

                </div>

                {{-- Mail Host --}}
                <div class="col-md-6">

                    <div class="form-group">

                        <label>Mail Host</label>

                        <input
                            type="text"
                            name="mail_host"
                            class="form-control @error('mail_host') is-invalid @enderror"
                            value="{{ old('mail_host', $smtp->mail_host) }}"
                            placeholder="Enter Mail Host"
                        >

                        @error('mail_host')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror

                    </div>

                </div>

                {{-- Mail Port --}}
                <div class="col-md-6">

                    <div class="form-group">

                        <label>Mail Port</label>

                        <input
                            type="text"
                            name="mail_port"
                            class="form-control @error('mail_port') is-invalid @enderror"
                            value="{{ old('mail_port', $smtp->mail_port) }}"
                            placeholder="Enter Mail Port"
                        >

                        @error('mail_port')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror

                    </div>

                </div>

                {{-- Mail Username --}}
                <div class="col-md-6">

                    <div class="form-group">

                        <label>Mail Username</label>

                        <input
                            type="text"
                            name="mail_username"
                            class="form-control @error('mail_username') is-invalid @enderror"
                            value="{{ old('mail_username', $smtp->mail_username) }}"
                            placeholder="Enter Mail Username"
                        >

                        @error('mail_username')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror

                    </div>

                </div>

                {{-- Mail Password --}}
                <div class="col-md-6">

                    <div class="form-group">

                        <label>Mail Password</label>

                        <input
                            type="text"
                            name="mail_password"
                            class="form-control @error('mail_password') is-invalid @enderror"
                            value="{{ old('mail_password', $smtp->mail_password) }}"
                            placeholder="Enter Mail Password"
                        >

                        @error('mail_password')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror

                    </div>

                </div>

                {{-- Encryption --}}
                <div class="col-md-6">

                    <div class="form-group">

                        <label>Encryption</label>

                        <select
                            name="mail_encryption"
                            class="form-control @error('mail_encryption') is-invalid @enderror"
                        >

                            <option value="">
                                Select Encryption
                            </option>

                            <option
                                value="tls"
                                {{ old('mail_encryption', $smtp->mail_encryption) == 'tls' ? 'selected' : '' }}
                            >
                                TLS
                            </option>

                            <option
                                value="ssl"
                                {{ old('mail_encryption', $smtp->mail_encryption) == 'ssl' ? 'selected' : '' }}
                            >
                                SSL
                            </option>

                        </select>

                        @error('mail_encryption')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror

                    </div>

                </div>

                {{-- From Email --}}
                <div class="col-md-6">

                    <div class="form-group">

                        <label>From Email</label>

                        <input
                            type="email"
                            name="mail_from_address"
                            class="form-control @error('mail_from_address') is-invalid @enderror"
                            value="{{ old('mail_from_address', $smtp->mail_from_address) }}"
                            placeholder="Enter From Email"
                        >

                        @error('mail_from_address')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror

                    </div>

                </div>

                {{-- From Name --}}
                <div class="col-md-6">

                    <div class="form-group">

                        <label>From Name</label>

                        <input
                            type="text"
                            name="mail_from_name"
                            class="form-control @error('mail_from_name') is-invalid @enderror"
                            value="{{ old('mail_from_name', $smtp->mail_from_name) }}"
                            placeholder="Enter From Name"
                        >

                        @error('mail_from_name')
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