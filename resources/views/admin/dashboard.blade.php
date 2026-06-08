@extends('admin.layouts.admin')

@section('title', 'Dashboard')

@section('content')

<div class="row g-4">

    <div class="col-xl-3 col-md-6">
        <div class="card bg-primary text-white border-0 shadow-sm">
            <div class="card-body">

                <h6 class="mb-2">
                    Today Visitors
                </h6>

                <h2 class="fw-bold">
                    {{ $today }}
                </h2>

            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6">
        <div class="card bg-success text-white border-0 shadow-sm">
            <div class="card-body">

                <h6 class="mb-2">
                    This Week
                </h6>

                <h2 class="fw-bold">
                    {{ $thisWeek }}
                </h2>

            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6">
        <div class="card bg-warning text-dark border-0 shadow-sm">
            <div class="card-body">

                <h6 class="mb-2">
                    This Month
                </h6>

                <h2 class="fw-bold">
                    {{ $thisMonth }}
                </h2>

            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6">
        <div class="card bg-danger text-white border-0 shadow-sm">
            <div class="card-body">

                <h6 class="mb-2">
                    Previous Month
                </h6>

                <h2 class="fw-bold">
                    {{ $prevMonth }}
                </h2>

            </div>
        </div>
    </div>

    <div class="col-12">
        <div class="card bg-dark text-white border-0 shadow-sm">
            <div class="card-body text-center">

                <h5 class="mb-2">
                    Total Visitors
                </h5>

                <h1 class="fw-bold">
                    {{ $totalVisitors }}
                </h1>

            </div>
        </div>
    </div>

</div>


@endsection
