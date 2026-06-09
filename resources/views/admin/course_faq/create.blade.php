@extends('admin.layouts.admin')

@section('title', 'Add Course FAQ')

@section('content')

<div class="form-wrapper">

    <div class="form-header">

        <div class="form-info">

            <h3 class="form-title">
                Add Course FAQ
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
                    Add FAQ
                </span>

            </div>

        </div>

        <div>

            <a href="{{ route('course-faq.index') }}" class="btn-list">
                <i class="fa-solid fa-list"></i>
                FAQ List
            </a>

        </div>

    </div>

    <div class="form-body">

        <form
            action="{{ route('course-faq.store') }}"
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

                {{-- Question --}}
                <div class="col-md-12">

                    <div class="form-group">

                        <label>Question</label>

                        <input
                            type="text"
                            name="question"
                            class="form-control @error('question') is-invalid @enderror"
                            value="{{ old('question') }}"
                            placeholder="Enter FAQ Question"
                        >

                        @error('question')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror

                    </div>

                </div>

                {{-- Answer --}}
                <div class="col-md-12">

                    <div class="form-group">

                        <label>Answer</label>

                        <textarea
                            name="answer"
                            rows="5"
                            class="form-control @error('answer') is-invalid @enderror"
                            placeholder="Enter FAQ Answer"
                        >{{ old('answer') }}</textarea>

                        @error('answer')
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
