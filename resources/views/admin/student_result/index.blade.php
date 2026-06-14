@extends('admin.layouts.admin')

@section('title', 'Student Result List')

@section('content')

    <div class="table-wrapper">

        <div class="table-header">
            <div class="table-header-top">
                <div class="table-info">
                    <h3 class="table-title">Student Result List</h3>
                    <div class="breadcrumb">
                        <span><a href="{{ route('admin.dashboard') }}">Dashboard</a></span>
                        <span><i class="fa-solid fa-caret-right"></i></span>
                        <span>Result List</span>
                    </div>
                </div>
                <div>
                    <a href="{{ route('student-result.create') }}" class="btn-add">
                        <i class="fa-solid fa-plus"></i> Add Result
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
                        <th>Course Name</th>
                        <th>Photo Preview</th>
                        <th class="text-end">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($results as $key => $data)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $data->course->title ?? 'N/A' }}</td>
                            <td>
                                @if($data->photo)
                                    <img src="{{ asset('storage/student_result/' . $data->photo) }}" alt="Result" style="width: 80px; height: 50px; object-fit: cover; border-radius: 4px;">
                                @else
                                    <span>No Image</span>
                                @endif
                            </td>
                            <td class="text-end">
                                <div class="action-group">
                                    <a class="action-btn btn-edit" href="{{ route('student-result.edit', $data->id) }}">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                    <button type="button" class="action-btn btn-delete resultDeleteBtn"
                                        data-url="{{ route('student-result.destroy', $data->id) }}">
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
            {{ $results->links() }}
        </div>

    </div>

@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('.resultDeleteBtn').on('click', function(e) {
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
                            type: 'DELETE',
                            data: { _token: '{{ csrf_token() }}' },
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
                                }
                            },
                            error: function() {
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
                    }
                });
            });
        });
    </script>
@endsection