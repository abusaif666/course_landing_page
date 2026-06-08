@extends('admin.layouts.admin')

@section('title', 'Edit Course')

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="form-wrapper">
        <div class="form-header">
            <div class="form-info">
                <h3 class="form-title">Edit Course</h3>
                <div class="breadcrumb">
                    <span><a href="{{ route('admin.dashboard') }}">Dashboard</a></span>
                    <span><i class="fa-solid fa-caret-right"></i></span>
                    <span>Edit Course</span>
                </div>
            </div>
            <div>
                <a href="{{ route('course.index') }}" class="btn-list"><i class="fa-solid fa-list"></i> Course List</a>
            </div>
        </div>

        <div class="form-body">
            {{-- রিসোর্স আপডেট করার জন্য POST মেথড এবং ভেতরে @method('PUT') ব্যবহার করা হয়েছে --}}
            <form action="{{ route('course.update', $course->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row g-3">

                    {{-- Course Title --}}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Course Title</label>
                            <input type="text" class="form-control" name="title"
                                value="{{ old('title', $course->title) }}" placeholder="Enter Course Title">
                            @error('title')
                                <small class="error-text">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    {{-- Course Type (Online / Offline) --}}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Course Type</label>
                            <select class="form-control" name="type">
                                <option value="">Select Type</option>
                                <option value="1" {{ old('type', $course->type) == '1' ? 'selected' : '' }}>Online
                                </option>
                                <option value="0" {{ old('type', $course->type) == '0' ? 'selected' : '' }}>Offline
                                </option>
                            </select>
                            @error('type')
                                <small class="error-text">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    {{-- Regular Price --}}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Price</label>
                            <input type="number" step="0.01" class="form-control" name="price"
                                value="{{ old('price', $course->price) }}" placeholder="Enter Course Price">
                            @error('price')
                                <small class="error-text">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    {{-- Discount Price --}}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Discount Price</label>
                            <input type="number" step="0.01" class="form-control" name="discount_price"
                                value="{{ old('discount_price', $course->discount_price) }}"
                                placeholder="Enter Discount Price">
                            @error('discount_price')
                                <small class="error-text">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    {{-- Video Link/Path --}}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Preview Video (URL/Path)</label>
                            <input type="text" class="form-control" name="video"
                                value="{{ old('video', $course->video) }}" placeholder="Enter Video Link">
                            @error('video')
                                <small class="error-text">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    {{-- Status (Active / Inactive) --}}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Status</label>
                            <select class="form-control" name="status">
                                <option value="1" {{ old('status', $course->status) == '1' ? 'selected' : '' }}>Active
                                </option>
                                <option value="0" {{ old('status', $course->status) == '0' ? 'selected' : '' }}>
                                    Inactive</option>
                            </select>
                            @error('status')
                                <small class="error-text">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    {{-- Course Description --}}
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Description</label>
                            <textarea class="form-control" name="description" rows="4" placeholder="Enter Course Description">{{ old('description', $course->description) }}</textarea>
                            @error('description')
                                <small class="error-text">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    {{-- Thumbnail (Dropify File Input with Old Value) --}}
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Course Thumbnail</label>
                            <input type="file" class="dropify" name="thumbnail" data-height="180"
                                data-allowed-file-extensions="jpg jpeg png webp"
                                data-default-file="{{ $course->thumbnail ? asset('storage/course/' . $course->thumbnail) : '' }}" />
                            @error('thumbnail')
                                <small class="error-text">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>


                    {{-- Update Button --}}
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

@section('script')
    <script>
        $(document).ready(function() {
            // Dropify ইনিশিয়ালাইজ করা হলো
            $('.dropify').dropify({
                messages: {
                    'default': 'Drag and drop a file here or click',
                    'replace': 'Drag and drop or click to replace',
                    'remove': 'Remove',
                    'error': 'Ooops, something wrong appended.'
                }
            });
        });
    </script>
@endsection
