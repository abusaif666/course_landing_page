@extends('admin.layouts.admin')

@section('title', 'Add SMTP')

@section('content')
    <div class="form-wrapper">
        <div class="form-header">
            <div class="form-info">
                <h3 class="form-title">Add SMTP</h3>
                <div class="breadcrumb">
                    <span><a href="{{ route('admin.dashboard') }}">Dashboard</a></span>
                    <span><i class="fa-solid fa-caret-right"></i></span>
                    <span>Add SMTP</span>
                </div>
            </div>
            <div>
                <a href="{{ route('smtp.index') }}" class="btn-list"><i class="fa-solid fa-list"></i> SMTP List</a>
            </div>
        </div>

        <div class="form-body">
            <form action="{{ route('smtp.store') }}" method="POST">
                @csrf
                <div class="row g-3">

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Mail Type</label>
                            <select id="mail_encryption" name="mail_type" class="form-control">
                                <option value="">Select</option>
                                <option value="default">Default</option>
                                <option value="order">Order</option>
                                <option value="payment">Pyament Status</option>
                                <option value="forget">Forget Password</option>
                            </select>

                            <span class="form_input_error_message mail_encryption_error"></span>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Mail Mailer</label>
                            <input type="text" id="mail_mailer" name="mail_mailer" class="form-control">
                            <span class="form_input_error_message mail_mailer_error"></span>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Mail Host</label>
                            <input type="text" id="mail_host" name="mail_host" class="form-control">
                            <span class="form_input_error_message mail_host_error"></span>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Mail Port</label>
                            <input type="text" id="mail_port" name="mail_port" class="form-control">
                            <span class="form_input_error_message mail_port_error"></span>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Mail Username</label>
                            <input type="text" id="mail_username" name="mail_username" class="form-control">
                            <span class="form_input_error_message mail_username_error"></span>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Mail Password</label>
                            <input type="password" id="mail_password" name="mail_password" class="form-control">
                            <span class="form_input_error_message mail_password_error"></span>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Encryption</label>

                            <select id="mail_encryption" name="mail_encryption" class="form-control">
                                <option value="">None</option>
                                <option value="tls">TLS</option>
                                <option value="ssl">SSL</option>
                            </select>

                            <span class="form_input_error_message mail_encryption_error"></span>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>From Email</label>
                            <input type="email" id="mail_from_address" name="mail_from_address" class="form-control">
                            <span class="form_input_error_message mail_from_address_error"></span>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>From Name</label>
                            <input type="text" id="mail_from_name" name="mail_from_name" class="form-control">
                            <span class="form_input_error_message mail_from_name_error"></span>
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
