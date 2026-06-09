@extends('admin.layouts.admin')

@section('title', 'Add Student Testimonial')

@section('content')

<div class="form-wrapper">

    <div class="form-header">

        <div class="form-info">

            <h3 class="form-title">
                Add Student Testimonial
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
                    Add Testimonial
                </span>

            </div>

        </div>

        <div>

            <a href="{{ route('student-testimonial.index') }}" class="btn-list">
                <i class="fa-solid fa-list"></i>
                Testimonial List
            </a>

        </div>

    </div>

    <div class="form-body">

        <form
            action="{{ route('student-testimonial.store') }}"
            method="POST"
        >

            @csrf

            <div class="row g-3">

                {{-- Course --}}
                <div class="col-md-12">

                    <div class="form-group">

                        <label>Select Course</label>

                        <select
                            name="course"
                            class="form-control @error('course') is-invalid @enderror"
                        >

                            <option value="">
                                Select a Course
                            </option>

                            @foreach ($courses as $course)

                                <option
                                    value="{{ $course->id }}"
                                    {{ old('course') == $course->id ? 'selected' : '' }}
                                >
                                    {{ $course->title }}
                                </option>

                            @endforeach

                        </select>

                        @error('course')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror

                    </div>

                </div>

                {{-- Video URL --}}
                <div class="col-md-12">

                    <div class="form-group">

                        <label>Video URL / Path</label>

                        <input
                            type="text"
                            name="video"
                            class="form-control @error('video') is-invalid @enderror"
                            value="{{ old('video') }}"
                            placeholder="Enter Video Embed URL or Path"
                        >

                        @error('video')
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
