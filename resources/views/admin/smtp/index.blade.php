@extends('admin.layouts.admin')

@section('title', 'SMTP List')

@section('content')

    <div class="table-wrapper">
        <div class="table-header">

            <div class="table-header-top">

                <div class="table-info">
                    <h3 class="table-title">SMTP List</h3>

                    <div class="breadcrumb">
                        <span><a href="{{ route('admin.dashboard') }}">Dashboard</a></span>
                        <span><i class="fa-solid fa-caret-right"></i></span>
                        <span>SMTP List</span>
                    </div>
                </div>

                <div>
                    <a href="{{ route('smtp.create') }}" class="btn-add">
                        <i class="fa-solid fa-plus"></i>
                        Add SMTP
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
                        <th>Type</th>
                        <th>Mailer</th>
                        <th>Host</th>
                        <th>Port</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Encryption</th>
                        <th>From Email</th>
                        <th>From Name</th>
                        <th class="text-end">Action</th>
                    </tr>
                </thead>

                <tbody>

                    @if ($smtps->count() > 0)
                        @foreach ($smtps as $smtp)
                            <tr>

                                <td>1</td>

                                <td>
                                    <span class="copy-text">{{ $smtp->mail_type }}</span>
                                    <button class="copy-btn">
                                        <i class="fa fa-copy"></i>
                                    </button>
                                </td>

                                <td>
                                    <span class="copy-text">{{ $smtp->mail_mailer }}</span>
                                    <button class="copy-btn">
                                        <i class="fa fa-copy"></i>
                                    </button>
                                </td>

                                <td>
                                    <span class="copy-text">{{ $smtp->mail_host }}</span>
                                    <button class="copy-btn">
                                        <i class="fa fa-copy"></i>
                                    </button>
                                </td>

                                <td>
                                    <span class="copy-text">{{ $smtp->mail_port }}</span>
                                    <button class="copy-btn">
                                        <i class="fa fa-copy"></i>
                                    </button>
                                </td>

                                <td>
                                    <span class="copy-text">{{ $smtp->mail_username }}</span>
                                    <button class="copy-btn">
                                        <i class="fa fa-copy"></i>
                                    </button>
                                </td>

                                <td>
                                    <span class="copy-text">{{ $smtp->mail_password }}</span>
                                    <button class="copy-btn">
                                        <i class="fa fa-copy"></i>
                                    </button>
                                </td>

                                <td>
                                    <span class="copy-text">{{ $smtp->mail_encryption }}</span>
                                    <button class="copy-btn">
                                        <i class="fa fa-copy"></i>
                                    </button>
                                </td>

                                <td>
                                    <span class="copy-text">{{ $smtp->mail_from_address }}</span>
                                    <button class="copy-btn">
                                        <i class="fa fa-copy"></i>
                                    </button>
                                </td>

                                <td>
                                    <span class="copy-text">{{ $smtp->mail_from_name }}</span>
                                    <button class="copy-btn">
                                        <i class="fa fa-copy"></i>
                                    </button>
                                </td>

                                <td class="text-end">
                                    <div class="action-group">

                                        <a class="action-btn btn-edit" href="{{ route('smtp.edit', $smtp->id) }}"><i class="fa-solid fa-pen-to-square"></i></a>

                                        <button type="button" data-url="{{ route('smtp.destroy', $smtp->id) }}"
                                            class="action-btn btn-delete smtpDeleteBtn">

                                            <i class="fa-solid fa-trash-can"></i>

                                        </button>

                                    </div>
                                </td>

                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="9" class="text-center">
                                No SMTP Setting Found
                            </td>
                        </tr>
                    @endif

                </tbody>
            </table>

        </div>
        <div class="admin_dashboard_table_bottom_area">
            <div class="admin_dashboard_table_pagination_wrapper">
                {{-- {{ $users->links() }} --}}
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script>
        $(document).ready(function() {


            // DELETE
            $(document).on('click', '.smtpDeleteBtn', function(e) {

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
                                _token: '{{ csrf_token() }}'
                            },

                            success: function(res) {

                                Swal.fire({
                                    toast: true,
                                    position: 'top-end',
                                    icon: 'success',
                                    title: res.message,
                                    background: '#198754',
                                    color: '#fff',
                                    showConfirmButton: false,
                                    timer: 2000
                                }).then(() => {

                                    location.reload();

                                });

                            }

                        });

                    }

                });

            });

        });
    </script>
@endsection
