@extends('admin.layouts.admin')

@section('title', 'Dashboard')

@section('content')

<div class="container-fluid admin_dashboard_wrapper">

    {{-- PAGE TITLE --}}
    <div class="admin_dashboard_header mb-4">
        <h2 class="fw-bold text-start">
            Dashboard
        </h2>
    </div>

    {{-- ================= INCOME SECTION ================= --}}
    <div class="admin_dashboard_section mb-5">

        <h5 class="admin_dashboard_section_title text-start mb-3">
            Income Overview
        </h5>

        <div class="row g-3">

            {{-- CARD --}}
            @php
                $cardClass = "admin_dashboard_card_modern";
            @endphp

            <div class="col-xl-3 col-md-6">
                <div class="{{ $cardClass }}">
                    <h6>Today Income</h6>
                    <h3>{{ $todayIncome }} TK</h3>
                </div>
            </div>

            <div class="col-xl-3 col-md-6">
                <div class="{{ $cardClass }}">
                    <h6>This Week Income</h6>
                    <h3>{{ $thisWeekIncome }} TK</h3>
                </div>
            </div>

            <div class="col-xl-3 col-md-6">
                <div class="{{ $cardClass }}">
                    <h6>This Month Income</h6>
                    <h3>{{ $thisMonthIncome }} TK</h3>
                </div>
            </div>

            <div class="col-xl-3 col-md-6">
                <div class="{{ $cardClass }}">
                    <h6>Previous Month Income</h6>
                    <h3>{{ $prevMonthIncome }} TK</h3>
                </div>
            </div>

            <div class="col-xl-3 col-md-6">
                <div class="admin_dashboard_card_modern big">
                    <h6>Total Income</h6>
                    <h2>{{ $totalIncome }} TK</h2>
                </div>
            </div>

        </div>

    </div>

    {{-- ================= VISITOR SECTION ================= --}}
    <div class="admin_dashboard_section">

        <h5 class="admin_dashboard_section_title text-start mb-3">
            Visitor Overview
        </h5>

        <div class="row g-3">

            <div class="col-xl-3 col-md-6">
                <div class="admin_dashboard_card_modern">
                    <h6>Today Visitors</h6>
                    <h3>{{ $today }}</h3>
                </div>
            </div>

            <div class="col-xl-3 col-md-6">
                <div class="admin_dashboard_card_modern">
                    <h6>This Week Visitors</h6>
                    <h3>{{ $thisWeek }}</h3>
                </div>
            </div>

            <div class="col-xl-3 col-md-6">
                <div class="admin_dashboard_card_modern">
                    <h6>This Month Visitors</h6>
                    <h3>{{ $thisMonth }}</h3>
                </div>
            </div>

            <div class="col-xl-3 col-md-6">
                <div class="admin_dashboard_card_modern">
                    <h6>Previous Month Visitors</h6>
                    <h3>{{ $prevMonth }}</h3>
                </div>
            </div>

            <div class="col-xl-3 col-md-6">
                <div class="admin_dashboard_card_modern big">
                    <h6>Total Visitors</h6>
                    <h2>{{ $totalVisitors }}</h2>
                </div>
            </div>

        </div>

    </div>

</div>

@endsection