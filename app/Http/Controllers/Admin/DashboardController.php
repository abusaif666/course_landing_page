<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Visitor;
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

        return view('admin.dashboard', compact(
            'today',
            'thisWeek',
            'thisMonth',
            'prevMonth',
            'totalVisitors'
        ));
    }

}