@extends('admin.layouts.admin')

@section('title', 'User List')

@section('content')

    <div class="table-wrapper">

        <div class="table-header">

            <div class="table-header-top">

                <div class="table-info">
                    <h3 class="table-title">User List</h3>

                    <div class="breadcrumb">
                        <span><a href="{{ route('admin.dashboard') }}">Dashboard</a></span>
                        <span><i class="fa-solid fa-caret-right"></i></span>
                        <span>User List</span>
                    </div>
                </div>

                <div>
                    <a href="{{ route('user.create') }}" class="btn-add">
                        <i class="fa-solid fa-plus"></i>
                        Add User
                    </a>
                </div>

            </div>

            <div class="table-header-bottom">
                <input type="search" class="table-search" placeholder="Search">
            </div>

        </div>

        <div class="table-responsive">

            <table class="custom-table">

                <thead>
                    <tr>
                        <th>Sl</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone No</th>
                        <th>Role</th>
                        <th class="text-end">Action</th>
                    </tr>
                </thead>

                <tbody>

                    @foreach ($users as $key => $data)
                        <tr>

                            <td>{{ $key + 1 }}</td>

                            <td>
                                <span class="copy-text">{{ $data->name }}</span>

                                <button class="copy-btn">
                                    <i class="fa fa-copy"></i>
                                </button>
                            </td>

                            <td>
                                <span class="copy-text">{{ $data->email }}</span>

                                <button class="copy-btn">
                                    <i class="fa fa-copy"></i>
                                </button>
                            </td>

                            <td>
                                <span class="copy-text">{{ $data->phone }}</span>

                                <button class="copy-btn">
                                    <i class="fa fa-copy"></i>
                                </button>
                            </td>

                            <td>
                                <span class="copy-text">{{ $data->role ?? '' }}</span>

                                <button class="copy-btn">
                                    <i class="fa fa-copy"></i>
                                </button>
                            </td>

                            <td class="text-end">

                                <div class="action-group">
                                    @php
                                        $authRole = auth()->user()->role;
                                        $targetRole = $data->role;
                                        $isOwnProfile = auth()->id() == $data->id;

                                        // Edit Permission
                                        $canEdit = false;

                                        if ($authRole === 'Super Admin') {
                                            $canEdit = true;
                                        } elseif ($authRole === 'Admin') {
                                            $canEdit = $targetRole !== 'Super Admin';
                                        } else {
                                            $canEdit = !in_array($targetRole, ['Super Admin', 'Admin']);
                                        }

                                        // Delete Permission
                                        $canDelete = false;

                                        if ($authRole === 'Super Admin') {
                                            $canDelete = !$isOwnProfile;
                                        } elseif ($authRole === 'Admin') {
                                            $canDelete = $targetRole !== 'Super Admin';
                                        } else {
                                            $canDelete = !in_array($targetRole, ['Super Admin', 'Admin']);
                                        }
                                    @endphp

                                    @if ($canEdit)
                                        <a class="action-btn btn-edit" href="{{ route('user.edit', $data->id) }}">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>
                                    @endif

                                    @if ($canDelete)
                                        <button type="button" class="action-btn btn-delete userDeleteBtn"
                                            data-url="{{ route('user.destroy', $data->id) }}">
                                            <i class="fa-solid fa-trash-can"></i>
                                        </button>
                                    @endif
                                </div>

                            </td>

                        </tr>
                    @endforeach

                </tbody>

            </table>

        </div>

        <div class="table-footer">
            {{ $users->links() }}
        </div>

    </div>

@endsection

@section('script')
    <script>
        $(document).ready(function() {




            // DELETE USER
            $('.userDeleteBtn').on('click', function(e) {

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
                            type: 'POST',

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

                                }

                            },

                            error: function(xhr) {

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
