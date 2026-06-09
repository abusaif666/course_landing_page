@extends('admin.layouts.admin')

@section('title', 'Edit Student Testimonial')

@section('content')

<div class="form-wrapper">

    <div class="form-header">

        <div class="form-info">

            <h3 class="form-title">
                Edit Student Testimonial
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
                    Edit Testimonial
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
            action="{{ route('student-testimonial.update', $testimonial->id) }}"
            method="POST"
        >

            @csrf
            @method('PUT')

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
                                    {{ old('course', $testimonial->course_id) == $course->id ? 'selected' : '' }}
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
                            value="{{ old('video', $testimonial->video) }}"
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
                        Update
                    </button>

                </div>

            </div>

        </form>

    </div>

</div>

@endsection