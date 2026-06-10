@extends('admin.layouts.admin')

@section('title', 'Edit Course')

@section('content')

<div class="form-wrapper">

    <div class="form-header">

        <div class="form-info">

            <h3 class="form-title">
                Edit Course
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
                    Edit Course
                </span>

            </div>

        </div>

        <div>
            <a href="{{ route('course.index') }}" class="btn-list">
                <i class="fa-solid fa-list"></i>
                Course List
            </a>
        </div>

    </div>

    <div class="form-body">

        <form
            action="{{ route('course.update', $course->id) }}"
            method="POST"
            enctype="multipart/form-data"
        >

            @csrf
            @method('PUT')

            <div class="row g-3">

                {{-- Course Title --}}
                <div class="col-md-6">

                    <div class="form-group">

                        <label>Course Title</label>

                        <input
                            type="text"
                            name="title"
                            class="form-control @error('title') is-invalid @enderror"
                            value="{{ old('title', $course->title) }}"
                            placeholder="Enter Course Title"
                        >

                        @error('title')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror

                    </div>

                </div>

                {{-- Course Type --}}
                <div class="col-md-6">

                    <div class="form-group">

                        <label>Course Type</label>

                        <select
                            name="type"
                            class="form-control @error('type') is-invalid @enderror"
                        >

                            <option value="">
                                Select Type
                            </option>

                            <option
                                value="1"
                                {{ old('type', $course->type) == '1' ? 'selected' : '' }}
                            >
                                Online
                            </option>

                            <option
                                value="0"
                                {{ old('type', $course->type) == '0' ? 'selected' : '' }}
                            >
                                Offline
                            </option>

                        </select>

                        @error('type')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror

                    </div>

                </div>

                {{-- Price --}}
                <div class="col-md-6">

                    <div class="form-group">

                        <label>Price</label>

                        <input
                            type="number"
                            step="0.01"
                            name="price"
                            class="form-control @error('price') is-invalid @enderror"
                            value="{{ old('price', $course->price) }}"
                            placeholder="Enter Course Price"
                        >

                        @error('price')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror

                    </div>

                </div>

                {{-- Discount Price --}}
                <div class="col-md-6">

                    <div class="form-group">

                        <label>Discount Price</label>

                        <input
                            type="number"
                            step="0.01"
                            name="discount_price"
                            class="form-control @error('discount_price') is-invalid @enderror"
                            value="{{ old('discount_price', $course->discount_price) }}"
                            placeholder="Enter Discount Price"
                        >

                        @error('discount_price')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror

                    </div>

                </div>

                {{-- Preview Video --}}
                <div class="col-md-6">

                    <div class="form-group">

                        <label>Preview Video</label>

                        <input
                            type="text"
                            name="video"
                            class="form-control @error('video') is-invalid @enderror"
                            value="{{ old('video', $course->video) }}"
                            placeholder="Enter Video URL"
                        >

                        @error('video')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror

                    </div>

                </div>

                {{-- Status --}}
                <div class="col-md-6">

                    <div class="form-group">

                        <label>Status</label>

                        <select
                            name="status"
                            class="form-control @error('status') is-invalid @enderror"
                        >

                            <option
                                value="1"
                                {{ old('status', $course->status) == '1' ? 'selected' : '' }}
                            >
                                Active
                            </option>

                            <option
                                value="0"
                                {{ old('status', $course->status) == '0' ? 'selected' : '' }}
                            >
                                Inactive
                            </option>

                        </select>

                        @error('status')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror

                    </div>

                </div>

                {{-- Description --}}
                <div class="col-md-12">

                    <div class="form-group">

                        <label>Description</label>

                        <textarea
                            name="description"
                            rows="5"
                            class="form-control @error('description') is-invalid @enderror"
                            placeholder="Enter Course Description"
                        >{{ old('description', $course->description) }}</textarea>

                        @error('description')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror

                    </div>

                </div>

                {{-- Whatsapp --}}
                <div class="col-md-6">

                    <div class="form-group">

                        <label>Whatsapp Link</label>

                        <input
                            type="text"
                            name="whatsapp"
                            class="form-control @error('whatsapp') is-invalid @enderror"
                            value="{{ old('whatsapp', $course->whatsapp) }}"
                            placeholder="Enter Whatsapp Link"
                        >

                        @error('whatsapp')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror

                    </div>

                </div>

                {{-- Drive --}}
                <div class="col-md-6">

                    <div class="form-group">

                        <label>Drive Link</label>

                        <input
                            type="text"
                            name="drive"
                            class="form-control @error('drive') is-invalid @enderror"
                            value="{{ old('drive', $course->drive) }}"
                            placeholder="Enter Drive Link"
                        >

                        @error('drive')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror

                    </div>

                </div>


                
                {{-- Offer Start --}}
                <div class="col-md-6">

                    <div class="form-group">

                        <label>Offer Start</label>

                        <input
                            type="date"
                            name="offer_start"
                            class="form-control @error('offer_start') is-invalid @enderror"
                            value="{{ old('offer_start', $course->offer_start) }}"
                        >

                        @error('offer_start')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror

                    </div>

                </div>

                {{-- Offer End --}}
                <div class="col-md-6">

                    <div class="form-group">

                        <label>Offer End</label>

                        <input
                            type="date"
                            name="offer_end"
                            class="form-control @error('offer_end') is-invalid @enderror"
                            value="{{ old('offer_end', $course->offer_end) }}"
                        >

                        @error('offer_end')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror

                    </div>

                </div>

                {{-- Thumbnail --}}
                <div class="col-md-4">

                    <div class="form-group">

                        <label>Course Thumbnail</label>

                        <input
                            type="file"
                            name="thumbnail"
                            class="dropify @error('thumbnail') is-invalid @enderror"
                            data-height="180"
                            data-allowed-file-extensions="jpg jpeg png webp"
                            data-default-file="{{ $course->thumbnail ? asset('storage/course/' . $course->thumbnail) : '' }}"
                        />

                        @error('thumbnail')
                            <small class="text-danger d-block mt-1">
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


@section('script')

<script>

    $(document).ready(function () {

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