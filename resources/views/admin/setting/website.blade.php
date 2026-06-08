@extends('admin.layouts.admin')

@section('title', 'Website Setting')

@section('content')
    <div class="form-wrapper">
        <div class="form-header">
            <div class="form-info">
                <h3 class="form-title">Website Setting</h3>
                <div class="breadcrumb">
                    <span>
                        <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                    </span>
                    <span>
                        <i class="fa-solid fa-caret-right"></i>
                    </span>
                    <span>Website Setting</span>
                </div>
            </div>
        </div>

        <div class="form-body">
            <form action="{{ route('website.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row g-3">

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Logo</label>
                            <input
                                type="file"
                                name="logo"
                                class="form-control dropify"
                                data-default-file="{{ $websiteSetting && $websiteSetting->logo ? asset('storage/setting/' . $websiteSetting->logo) : '' }}"
                            >

                            @error('logo')
                                <small class="error-text">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Favicon</label>
                            <input
                                type="file"
                                name="favicon"
                                class="form-control dropify"
                                data-default-file="{{ $websiteSetting && $websiteSetting->favicon ? asset('storage/setting/' . $websiteSetting->favicon) : '' }}"
                            >

                            @error('favicon')
                                <small class="error-text">{{ $message }}</small>
                            @enderror
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
