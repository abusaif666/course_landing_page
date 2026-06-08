@extends('admin.layouts.admin')

@section('title', 'Order Management')

@section('content')

    <div class="table-wrapper">

        <div class="table-header">
            <div class="table-header-top">
                <div class="table-info">
                    <h3 class="table-title">Order List</h3>
                    <div class="breadcrumb">
                        <span><a href="{{ route('admin.dashboard') }}">Dashboard</a></span>
                        <span><i class="fa-solid fa-caret-right"></i></span>
                        <span>Orders</span>
                    </div>
                </div>
            </div>
            <div class="table-header-bottom">
                <input type="search" class="table-search" placeholder="Search orders...">
            </div>
        </div>

        <div class="table-responsive">
            <table class="custom-table">
                <thead>
                    <tr>
                        <th>Sl</th>
                        <th>Student Details</th>
                        <th>Course</th>
                        <th>Price</th>
                        <th>Payment Method</th>
                        <th>Trx ID</th>
                        <th>Payment Status</th>
                        <th>Order Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $key => $order)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>
                                <strong>{{ $order->name }}</strong><br>
                                <small class="text-muted">{{ $order->phone }}</small><br>
                                <small class="text-muted">{{ $order->email ?? 'No Email' }}</small>
                            </td>
                            <td>{{ $order->course->title ?? 'N/A' }}</td>
                            <td>{{ number_format($order->course_price, 2) }} TK</td>
                            <td><span class="badge bg-secondary text-uppercase">{{ $order->payment_method ?? 'N/A' }}</span>
                            </td>
                            <td><code>{{ $order->transaction_id ?? 'N/A' }}</code></td>

                            {{-- Payment Status Dropdown --}}
                            <td>
                                <select class="form-control form-control-sm status-change" data-id="{{ $order->id }}"
                                    name="payment_status" style="width: 130px;">

                                    <option value="pending" {{ $order->payment_status == 'pending' ? 'selected' : '' }}>
                                        Pending
                                    </option>

                                    <option value="completed"
                                        {{ $order->payment_status == 'completed' ? 'selected' : '' }}>
                                        Completed
                                    </option>

                                    <option value="failed" {{ $order->payment_status == 'failed' ? 'selected' : '' }}>
                                        Failed
                                    </option>

                                    <option value="cancelled"
                                        {{ $order->payment_status == 'cancelled' ? 'selected' : '' }}>
                                        Cancelled
                                    </option>

                                </select>
                            </td>
                            <td>
                                {{ $order->order_status }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="table-footer">
            {{ $orders->links() }}
        </div>

    </div>

@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('.status-change').on('change', function() {
                let orderId = $(this).data('id');
                let row = $(this).closest('tr');
                let payment_status = row.find('select[name="payment_status"]').val();

                $.ajax({
                    url: "{{ url('admin/orders/update-status') }}/" + orderId,
                    type: 'PUT',
                    data: {
                        _token: '{{ csrf_token() }}',
                        payment_status: payment_status,
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
                                timer: 2000
                            });
                        }
                    },
                    error: function() {
                        Swal.fire({
                            toast: true,
                            position: 'top-end',
                            icon: 'error',
                            title: 'Failed to update status!',
                            background: '#dc3545',
                            color: '#ffffff',
                            showConfirmButton: false,
                            timer: 2000
                        });
                    }
                });
                
            });
        });
    </script>
@endsection
