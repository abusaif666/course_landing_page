@extends('admin.layouts.admin')

@section('title', 'General Setting')

@section('content')
    <div class="form-wrapper">
        <div class="form-header">
            <div class="form-info">
                <h3 class="form-title">General Setting</h3>
                <div class="breadcrumb">
                    <span><a href="{{ route('admin.dashboard') }}">Dashboard</a></span>
                    <span><i class="fa-solid fa-caret-right"></i></span>
                    <span>General Setting</span>
                </div>
            </div>
        </div>

        <div class="form-body">
            <form action="{{ route('general.store') }}" method="POST">
                @csrf
                <div class="row g-3">

                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Site Name</label>
                            <input type="text" class="form-control" name="site_name" value="{{ $generalSetting->site_name ?? '' }}" placeholder="Site Name">
                            @error('site_name')
                                <small class="error-text">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Site Title</label>
                            <input type="text" class="form-control" name="site_title" value="{{ $generalSetting->site_title ?? '' }}" placeholder="Site Title">
                            @error('site_title')
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
