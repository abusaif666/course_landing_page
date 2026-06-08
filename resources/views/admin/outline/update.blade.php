@extends('admin.layouts.admin')

@section('title', 'Edit Course Outline')

@section('content')
    <div class="form-wrapper">
        <div class="form-header">
            <div class="form-info">
                <h3 class="form-title">Edit Course Outline</h3>
                <div class="breadcrumb">
                    <span><a href="{{ route('admin.dashboard') }}">Dashboard</a></span>
                    <span><i class="fa-solid fa-caret-right"></i></span>
                    <span>Edit Outline</span>
                </div>
            </div>
            <div>
                <a href="{{ route('outline.index') }}" class="btn-list"><i class="fa-solid fa-list"></i> Outline List</a>
            </div>
        </div>

        <div class="form-body">
            <form action="{{ route('outline.update', $outline->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row g-3">

                    {{-- Select Course --}}
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Select Course</label>
                            <select class="form-control" name="course">
                                <option value="">Select a Course</option>
                                @foreach ($courses as $course)
                                    <option value="{{ $course->id }}"
                                        {{ old('course', $outline->course_id) == $course->id ? 'selected' : '' }}>
                                        {{ $course->title }}</option>
                                @endforeach
                            </select>
                            @error('course')
                                <small class="error-text">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    {{-- Outline Text --}}
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Outline / Module Title</label>
                            <input type="text" class="form-control" name="outline"
                                value="{{ old('outline', $outline->outline) }}" placeholder="Enter Outline Title">
                            @error('outline')
                                <small class="error-text">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    {{-- Update Button --}}
                    <div class="col-md-12">
                        <button type="submit" class="btn-submit">Update</button>
                    </div>

                </div>
            </form>
        </div>
    </div>
@endsection
