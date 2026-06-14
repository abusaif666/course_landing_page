@extends('admin.layouts.admin')

@section('title', 'Course List')

@section('content')

    <div class="table-wrapper">

        <div class="table-header">

            <div class="table-header-top">

                <div class="table-info">
                    <h3 class="table-title">Course List</h3>

                    <div class="breadcrumb">
                        <span><a href="{{ route('admin.dashboard') }}">Dashboard</a></span>
                        <span><i class="fa-solid fa-caret-right"></i></span>
                        <span>Course List</span>
                    </div>
                </div>

                <div>
                    <a href="{{ route('course.create') }}" class="btn-add">
                        <i class="fa-solid fa-plus"></i>
                        Add Course
                    </a>
                </div>

            </div>

            <div class="table-header-bottom">
               
            </div>

        </div>

        <div class="table-responsive">

            <table class="custom-table">

                <thead>
                    <tr>
                        <th>Sl</th>
                        <th>Title</th>
                        <th>Price</th>
                        <th>Discount Price</th>
                        <th>Type</th>
                        <th>Status</th>
                        <th class="text-end">Action</th>
                    </tr>
                </thead>

                <tbody>

                    @foreach ($courses as $key => $data)
                        <tr>

                            <td>{{ $key + 1 }}</td>

                            <td>
                                <span class="copy-text">{{ $data->title }}</span>
                                <button class="copy-btn">
                                    <i class="fa fa-copy"></i>
                                </button>
                            </td>

                            <td>
                                <span>${{ number_format($data->price, 2) }}</span>
                            </td>

                            <td>
                                <span>${{ number_format($data->discount_price, 2) }}</span>
                            </td>

                            <td>
                                @if($data->type == 1)
                                    <span class="badge bg-success">Online</span>
                                @else
                                    <span class="badge bg-danger">Offline</span>
                                @endif
                            </td>

                            <td>
                                @if($data->status == 1)
                                    <span class="badge bg-success">Active</span>
                                @else
                                    <span class="badge bg-danger">Inactive</span>
                                @endif
                            </td>

                            <td class="text-end">

                                <div class="action-group">
                                    {{-- Course Edit Button --}}
                                    <a class="action-btn btn-edit" href="{{ route('course.edit', $data->id) }}">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>

                                    {{-- Course Delete Button using AJAX --}}
                                    <button type="button" class="action-btn btn-delete courseDeleteBtn"
                                        data-url="{{ route('course.destroy', $data->id) }}">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </button>
                                </div>

                            </td>

                        </tr>
                    @endforeach

                </tbody>

            </table>

        </div>

        <div class="table-footer">
            {{ $courses->links() }}
        </div>

    </div>

@endsection

@section('script')
    <script>
        $(document).ready(function() {

            // DELETE COURSE VIA AJAX
            $('.courseDeleteBtn').on('click', function(e) {

                e.preventDefault();

                let url = $(this).data('url');

                Swal.fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#d33",
                    cancelButtonColor: "#3085d6",
                    confirmButtonText: "Yes, delete it!"
                }).then((result) => {

                    if (result.isConfirmed) {

                        $.ajax({
                            url: url,
                            type: 'DELETE', // Laravel resource route এ ডিলিট করার জন্য DELETE মেথড ব্যবহার করা বেস্ট প্র্যাকটিস
                            data: {
                                _token: '{{ csrf_token() }}',
                            },
                            success: function(res) {

                                if (res.status === 'success') {

                                    Swal.fire({
                                        toast: true,
                                        position: 'top-end',
                                        icon: 'success',
                                        title: res.message,
                                        background: '#198754',
                                        color: '#ffffff',
                                        showConfirmButton: false,
                                        timer: 2000,
                                        timerProgressBar: true
                                    }).then(() => {
                                        window.location.reload();
                                    });

                                } else {
                                    showErrorAlert();
                                }
                            },
                            error: function(xhr) {
                                showErrorAlert();
                            }
                        });
                    }
                });
            });

            function showErrorAlert() {
                Swal.fire({
                    toast: true,
                    position: 'top-end',
                    icon: 'error',
                    title: 'Something Went Wrong',
                    background: '#dc3545',
                    color: '#ffffff',
                    showConfirmButton: false,
                    timer: 2000,
                    timerProgressBar: true
                });
            }

        });
    </script>
@endsection