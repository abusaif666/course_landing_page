@extends('admin.layouts.admin')

@section('title', 'Add Course FAQ')

@section('content')
    <div class="form-wrapper">
        <div class="form-header">
            <div class="form-info">
                <h3 class="form-title">Add Course FAQ</h3>
                <div class="breadcrumb">
                    <span><a href="{{ route('admin.dashboard') }}">Dashboard</a></span>
                    <span><i class="fa-solid fa-caret-right"></i></span>
                    <span>Add FAQ</span>
                </div>
            </div>
            <div>
                <a href="{{ route('course-faq.index') }}" class="btn-list"><i class="fa-solid fa-list"></i> FAQ List</a>
            </div>
        </div>

        <div class="form-body">
            <form action="{{ route('course-faq.store') }}" method="POST">
                @csrf
                <div class="row g-3">

                    {{-- Select Course --}}
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Select Course</label>
                            <select class="form-control" name="course">
                                <option value="">Select a Course</option>
                                @foreach ($courses as $course)
                                    <option value="{{ $course->id }}"
                                        {{ old('course') == $course->id ? 'selected' : '' }}>{{ $course->title }}</option>
                                @endforeach
                            </select>
                            @error('course')
                                <small class="error-text">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    {{-- Question --}}
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Question</label>
                            <input type="text" class="form-control" name="question" value="{{ old('question') }}"
                                placeholder="Enter FAQ Question">
                            @error('question')
                                <small class="error-text">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    {{-- Answer --}}
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Answer</label>
                            <textarea class="form-control" name="answer" rows="4" placeholder="Enter FAQ Answer">{{ old('answer') }}</textarea>
                            @error('answer')
                                <small class="error-text">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    {{-- Submit Button --}}
                    <div class="col-md-12">
                        <button type="submit" class="btn-submit">Submit</button>
                    </div>

                </div>
            </form>
        </div>
    </div>
@endsection
