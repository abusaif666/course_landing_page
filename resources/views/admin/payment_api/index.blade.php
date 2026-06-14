@extends('admin.layouts.admin')

@section('title', 'Payment API List')

@section('content')

    <div class="table-wrapper">

        <div class="table-header">

            <div class="table-header-top">

                <div class="table-info">
                    <h3 class="table-title">Payment API List</h3>

                    <div class="breadcrumb">
                        <span><a href="{{ route('admin.dashboard') }}">Dashboard</a></span>
                        <span><i class="fa-solid fa-caret-right"></i></span>
                        <span>Payment API List</span>
                    </div>
                </div>

                <div>
                    <a href="{{ route('payment-api.create') }}" class="btn-add">
                        <i class="fa-solid fa-plus"></i>
                        Add Payment API
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
                        <th>Provider Name</th>
                        <th>API Key</th>
                        <th>Secret Key</th>
                        <th>Status</th>
                        <th class="text-end">Action</th>
                    </tr>
                </thead>

                <tbody>

                    @foreach ($paymentApis as $key => $data)
                        <tr>

                            <td>{{ $key + 1 }}</td>

                            <td>
                                <span class="copy-text">{{ $data->provider_name }}</span>

                                <button class="copy-btn">
                                    <i class="fa fa-copy"></i>
                                </button>
                            </td>

                            <td>
                                <span class="copy-text">{{ $data->api_key }}</span>

                                <button class="copy-btn">
                                    <i class="fa fa-copy"></i>
                                </button>
                            </td>

                            <td>
                                <span class="copy-text">{{ $data->secret_key }}</span>

                                <button class="copy-btn">
                                    <i class="fa fa-copy"></i>
                                </button>
                            </td>

                            <td>
                                <span class="badge {{ $data->status === 'Active' ? 'bg-success' : 'bg-danger' }}">
                                    {{ $data->status ?? '' }}
                                </span>
                            </td>

                            <td class="text-end">

                                <div class="action-group">
                                    {{-- Edit Button --}}
                                    <a class="action-btn btn-edit" href="{{ route('payment-api.edit', $data->id) }}">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>

                                    {{-- Delete Button --}}
                                    <button type="button" class="action-btn btn-delete paymentApiDeleteBtn"
                                        data-url="{{ route('payment-api.destroy', $data->id) }}">
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
            {{ $paymentApis->links() }}
        </div>

    </div>

@endsection

@section('script')
    <script>
        $(document).ready(function() {

            // DELETE PAYMENT API
            $('.paymentApiDeleteBtn').on('click', function(e) {

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
                                _method: 'DELETE', // Resource route delete করতে এটি প্রয়োজন
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
