@extends('admin.layouts.admin')

@section('title', 'SMTP Test')

@section('content')

    <div class="page-wrapper">
        <div class="page-header">
            <div>
                <h3 class="page-title">SMTP Test</h3>
                <div class="breadcrumb">
                    <span><a href="#">Dashboard</a></span>
                    <span><i class="fa-solid fa-caret-right"></i></span>
                    <span>SMTP Test</span>
                </div>
            </div>
        </div>

        <div class="row g-4">


            <div class="col-lg-12">
                <div class="card-box">
                    <div class="card-header">
                        <h5>Default Test</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('smtp.default.mail') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" name="email" class="form-control" placeholder="Enter Form Email Address">
                                @error('email') <small class="error-text">{{ $message }}</small> @enderror
                            </div>
                            <button type="submit" class="btn-submit">Send Default</button>
                        </form>
                    </div>
                </div>
            </div>



            <div class="col-lg-12">
                <div class="card-box">
                    <div class="card-header">
                        <h5>OTP Test</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('smtp.forget.mail') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" name="email" class="form-control" placeholder="Enter Form Email Address">
                                @error('email') <small class="error-text">{{ $message }}</small> @enderror
                            </div>
                            <button type="submit" class="btn-submit">Send OTP</button>
                        </form>
                    </div>
                </div>
            </div>


            <div class="col-lg-12">
                <div class="card-box">
                    <div class="card-header">
                        <h5>Payment Test</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('smtp.payment.mail') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" name="payemail" class="form-control" placeholder="Enter Form Email Address">
                                @error('email') <small class="error-text">{{ $message }}</small> @enderror
                            </div>
                            <button type="submit" class="btn-submit">Send Payment</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


