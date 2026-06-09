@extends('admin.layouts.admin')

@section('title', 'Add Course Benefit')

@section('content')

<div class="form-wrapper">

    <div class="form-header">

        <div class="form-info">

            <h3 class="form-title">
                Add Course Benefit
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
                    Add Benefit
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
            action="{{ route('benefit.store') }}"
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

                {{-- Benefit --}}
                <div class="col-md-12">

                    <div class="form-group">

                        <label>Benefit</label>

                        <input
                            type="text"
                            name="benefit"
                            class="form-control @error('benefit') is-invalid @enderror"
                            value="{{ old('benefit') }}"
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
                        Submit
                    </button>

                </div>

            </div>

        </form>

    </div>

</div>

@endsection