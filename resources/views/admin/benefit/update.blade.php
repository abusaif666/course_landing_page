@extends('admin.layouts.admin')

@section('title', 'Edit Course Benefit')

@section('content')

<div class="form-wrapper">

    <div class="form-header">

        <div class="form-info">

            <h3 class="form-title">
                Edit Course Benefit
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
                    Edit Benefit
                </span>

            </div>

        </div>

        <div>

            <a href="{{ route('benefit.index') }}" class="btn-list">
                <i class="fa-solid fa-list"></i>
                Benefit List
            </a>

        </div>

    </div>

    <div class="form-body">

        <form
            action="{{ route('benefit.update', $benefit->id) }}"
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
                                    {{ old('course', $benefit->course_id) == $course->id ? 'selected' : '' }}
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

                {{-- Benefit --}}
                <div class="col-md-12">

                    <div class="form-group">

                        <label>Benefit</label>

                        <input
                            type="text"
                            name="benefit"
                            class="form-control @error('benefit') is-invalid @enderror"
                            value="{{ old('benefit', $benefit->benefit) }}"
                            placeholder="Enter Course Benefit"
                        >

                        @error('benefit')
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
