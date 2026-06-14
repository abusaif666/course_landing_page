@extends('admin.layouts.admin')

@section('title', 'Add Bonus Course')

@section('content')

<div class="form-wrapper">

    <div class="form-header">

        <div class="form-info">

            <h3 class="form-title">
                Add Bonus Course
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
                    Add Bonus Course
                </span>

            </div>

        </div>

        <div>

            <a href="{{ route('bonus-course.index') }}" class="btn-list">

                <i class="fa-solid fa-list"></i>

                Bonus Course List

            </a>

        </div>

    </div>

    <div class="form-body">

        <form action="{{ route('bonus-course.store') }}" method="POST">

            @csrf

            <div class="row g-3">

                {{-- Main Course --}}
                <div class="col-md-12">

                    <div class="form-group">

                        <label>Select Main Course</label>

                        <select
                            name="course_id"
                            class="form-control @error('course_id') is-invalid @enderror"
                        >

                            <option value="">
                                Select Course
                            </option>

                            @foreach ($courses as $course)

                                <option
                                    value="{{ $course->id }}"
                                    {{ old('course_id') == $course->id ? 'selected' : '' }}
                                >
                                    {{ $course->title }}
                                </option>

                            @endforeach

                        </select>

                        @error('course_id')

                            <small class="text-danger">
                                {{ $message }}
                            </small>

                        @enderror

                    </div>

                </div>

                {{-- Title --}}
                <div class="col-md-6">

                    <div class="form-group">

                        <label>Bonus Course Title</label>

                        <input
                            type="text"
                            name="title"
                            value="{{ old('title') }}"
                            placeholder="Enter Bonus Course Title"
                            class="form-control @error('title') is-invalid @enderror"
                        >

                        @error('title')

                            <small class="text-danger">
                                {{ $message }}
                            </small>

                        @enderror

                    </div>

                </div>

                {{-- Price --}}
                <div class="col-md-3">

                    <div class="form-group">

                        <label>Price</label>

                        <input
                            type="number"
                            step="0.01"
                            name="price"
                            value="{{ old('price') }}"
                            placeholder="Enter Price"
                            class="form-control @error('price') is-invalid @enderror"
                        >

                        @error('price')

                            <small class="text-danger">
                                {{ $message }}
                            </small>

                        @enderror

                    </div>

                </div>

                {{-- Discount Price --}}
                <div class="col-md-3">

                    <div class="form-group">

                        <label>Discount Price (Optional)</label>

                        <input
                            type="number"
                            step="0.01"
                            name="discount_price"
                            value="{{ old('discount_price') }}"
                            placeholder="Free হলে খালি রাখুন"
                            class="form-control @error('discount_price') is-invalid @enderror"
                        >

                        @error('discount_price')

                            <small class="text-danger">
                                {{ $message }}
                            </small>

                        @enderror

                    </div>

                </div>

                {{-- Description --}}
                <div class="col-md-12">

                    <div class="form-group">

                        <label>Description</label>

                        <textarea
                            name="description"
                            rows="5"
                            placeholder="Enter Description"
                            class="form-control @error('description') is-invalid @enderror"
                        >{{ old('description') }}</textarea>

                        @error('description')

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

                            <option value="1">
                                Active
                            </option>

                            <option value="0">
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
                        Submit
                    </button>

                </div>

            </div>

        </form>

    </div>

</div>

@endsection