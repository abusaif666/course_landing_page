@extends('admin.layouts.admin')

@section('title', 'Add Course Outline')

@section('content')

<div class="form-wrapper">

    <div class="form-header">

        <div class="form-info">

            <h3 class="form-title">
                Add Course Outline
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
                    Add Outline
                </span>

            </div>

        </div>

        <div>

            <a href="{{ route('outline.index') }}" class="btn-list">
                <i class="fa-solid fa-list"></i>
                Outline List
            </a>

        </div>

    </div>

    <div class="form-body">

        <form
            action="{{ route('outline.store') }}"
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

                {{-- Outline --}}
                <div class="col-md-12">

                    <div class="form-group">

                        <label>Outline / Module Title</label>

                        <input
                            type="text"
                            name="outline"
                            class="form-control @error('outline') is-invalid @enderror"
                            value="{{ old('outline') }}"
                            placeholder="Enter Outline Title"
                        >

                        @error('outline')
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
