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
                <input type="search" id="search-input" class="table-search" placeholder="Search orders...">
            </div>
        </div>

        <div id="order-table-container">
            @include('admin.order.table')
        </div>

    </div>

@endsection

@section('script')
    <script>
        $(document).ready(function() {

            // ১. ফাংশন: ডাটা ফেচ করা (সার্চ এবং পেজিনেশন এর জন্য)
            function fetchOrders(page = 1, search = '') {
                $.ajax({
                    url: "{{ route('order.index') }}?page=" + page + "&search=" + search,
                    type: "GET",
                    success: function(data) {
                        $('#order-table-container').html(data);
                    },
                    error: function() {
                        console.log('Error loading orders.');
                    }
                });
            }

            // ২. রিয়েল-টাইম সার্চ (Debounce সহ)
            let searchTimer;
            $('#search-input').on('keyup search', function() {
                clearTimeout(searchTimer);
                let searchVal = $(this).val();

                searchTimer = setTimeout(function() {
                    fetchOrders(1, searchVal); // সার্চ করলে সবসময় ১ম পেজ থেকে দেখাবে
                }, 250);
            });

            // ৩. Ajax পেজিনেশন লিংক ক্লিক হ্যান্ডলার
            $(document).on('click', '.pagination a', function(e) {
                e.preventDefault();
                let page = $(this).attr('href').split('page=')[1];
                let searchVal = $('#search-input').val();
                fetchOrders(page, searchVal);
            });

            // ৪. স্ট্যাটাস পরিবর্তন (Ajax)
            $(document).on('change', '.status-change', function() {
                let orderId = $(this).data('id');
                let payment_status = $(this).val();

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
