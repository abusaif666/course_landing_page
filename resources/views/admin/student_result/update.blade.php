@extends('admin.layouts.admin')

@section('title', 'Edit Student Result')

@section('content')
    <div class="form-wrapper">
        <div class="form-header">
            <div class="form-info">
                <h3 class="form-title">Edit Student Result</h3>
                <div class="breadcrumb">
                    <span><a href="{{ route('admin.dashboard') }}">Dashboard</a></span>
                    <span><i class="fa-solid fa-caret-right"></i></span>
                    <span>Edit Result</span>
                </div>
            </div>
            <div>
                <a href="{{ route('student-result.index') }}" class="btn-list"><i class="fa-solid fa-list"></i> Result
                    List</a>
            </div>
        </div>

        <div class="form-body">
            <form action="{{ route('student-result.update', $result->id) }}" method="POST" enctype="multipart/form-data">
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
                                        {{ old('course', $result->course_id) == $course->id ? 'selected' : '' }}>
                                        {{ $course->title }}</option>
                                @endforeach
                            </select>
                            @error('course')
                                <small class="error-text">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    {{-- Photo (Dropify with default file) --}}
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Student Result Photo</label>
                            <input type="file" class="dropify" name="photo" data-height="100"
                                data-allowed-file-extensions="jpg jpeg png webp"
                                data-default-file="{{ $result->photo ? asset('storage/student_result/' . $result->photo) : '' }}" />
                            @error('photo')
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

@section('script')
    <script>
        $(document).ready(function() {
            $('.dropify').dropify();
        });
    </script>
@endsection
