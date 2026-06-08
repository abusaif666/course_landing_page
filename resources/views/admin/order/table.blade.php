<div class="table-responsive">
    <table class="custom-table">
        <thead>
            <tr>
                <th>Sl</th>
                <th>Trx ID</th>
                <th>Student Details</th>
                <th>Course</th>
                <th>Price</th>
                <th>Payment Method</th>
                <th>Payment Status</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($orders as $key => $order)
                <tr>
                    <td>{{ ($orders->currentPage() - 1) * $orders->perPage() + $key + 1 }}</td>
                    <td>
                        <div class="copy_area">
                            <span class="copy-text">{{ $order->transaction_id ?? 'N/A' }}</span>
                            <button class="copy-btn">
                                <i class="fa fa-copy"></i>
                            </button>
                        </div>
                    </td>
                    <td>
                        <strong>{{ $order->name }}</strong><br>
                        <small class="text-muted">{{ $order->phone }}</small><br>
                        <small class="text-muted">{{ $order->email ?? 'No Email' }}</small>
                    </td>
                    <td>{{ $order->course->title ?? 'N/A' }}</td>
                    <td>{{ number_format($order->course_price, 2) }} TK</td>
                    <td>{{ $order->payment_method ?? 'N/A' }}</td>
                    <td>
                        <select class="form-control form-control-sm status-change" data-id="{{ $order->id }}" name="payment_status" style="width: 130px;">
                            <option value="pending" {{ $order->payment_status == 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="completed" {{ $order->payment_status == 'completed' ? 'selected' : '' }}>Completed</option>
                            <option value="failed" {{ $order->payment_status == 'failed' ? 'selected' : '' }}>Failed</option>
                            <option value="cancelled" {{ $order->payment_status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                        </select>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center">No orders found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="table-footer">
    {{ $orders->links() }}
</div>
