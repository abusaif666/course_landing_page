<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Visitor;
use App\Models\Order;
use Carbon\Carbon;

class DashboardController extends Controller
{

    public function AdminDashboard()
    {

        // Today
        $today = Visitor::whereDate(
            'created_at',
            Carbon::today()
        )->count();

        // This Week
        $thisWeek = Visitor::whereBetween(
            'created_at',
            [
                Carbon::now()->startOfWeek(),
                Carbon::now()->endOfWeek()
            ]
        )->count();

        // This Month
        $thisMonth = Visitor::whereMonth(
                'created_at',
                Carbon::now()->month
            )
            ->whereYear(
                'created_at',
                Carbon::now()->year
            )
            ->count();

        // Previous Month
        $prevMonth = Visitor::whereMonth(
                'created_at',
                Carbon::now()->subMonth()->month
            )
            ->whereYear(
                'created_at',
                Carbon::now()->subMonth()->year
            )
            ->count();

        // Total
        $totalVisitors = Visitor::count();

      $todayIncome = Order::whereDate('created_at', Carbon::today())
    ->where('payment_status', 'completed')
    ->sum('course_price');

$thisWeekIncome = Order::whereBetween('created_at', [
        Carbon::now()->startOfWeek(),
        Carbon::now()->endOfWeek()
    ])
    ->where('payment_status', 'completed')
    ->sum('course_price');

$thisMonthIncome = Order::whereMonth('created_at', Carbon::now()->month)
    ->whereYear('created_at', Carbon::now()->year)
    ->where('payment_status', 'completed')
    ->sum('course_price');

$prevMonthIncome = Order::whereMonth('created_at', Carbon::now()->subMonth()->month)
    ->whereYear('created_at', Carbon::now()->subMonth()->year)
    ->where('payment_status', 'completed')
    ->sum('course_price');

$totalIncome = Order::where('payment_status', 'completed')
    ->sum('course_price');

        return view('admin.dashboard', compact(
            'today',
            'thisWeek',
            'thisMonth',
            'prevMonth',
            'totalVisitors',
                    'todayIncome',
        'thisWeekIncome',
        'thisMonthIncome',
        'prevMonthIncome',
        'totalIncome'
        ));
    }

}