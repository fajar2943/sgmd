<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request){
        $year = $request->year ?? now()->year;
        $processing = Order::whereStatus('Process')->count();
        $success = Order::whereStatus('Success')->count();
        $cancel = Order::whereStatus('Cancel')->count();
        $expired = Order::whereStatus('Expired')->count();
        $minYear = date('Y', strtotime(Order::orderBy('created_at')->value('created_at')));
        $orders = [
            Order::where('status', 'Success')->whereYear('created_at', $year)->whereMonth('created_at','1')->count(),
            Order::where('status', 'Success')->whereYear('created_at', $year)->whereMonth('created_at','2')->count(),
            Order::where('status', 'Success')->whereYear('created_at', $year)->whereMonth('created_at','3')->count(),
            Order::where('status', 'Success')->whereYear('created_at', $year)->whereMonth('created_at','4')->count(),
            Order::where('status', 'Success')->whereYear('created_at', $year)->whereMonth('created_at','5')->count(),
            Order::where('status', 'Success')->whereYear('created_at', $year)->whereMonth('created_at','6')->count(),
            Order::where('status', 'Success')->whereYear('created_at', $year)->whereMonth('created_at','7')->count(),
            Order::where('status', 'Success')->whereYear('created_at', $year)->whereMonth('created_at','8')->count(),
            Order::where('status', 'Success')->whereYear('created_at', $year)->whereMonth('created_at','9')->count(),
            Order::where('status', 'Success')->whereYear('created_at', $year)->whereMonth('created_at','10')->count(),
            Order::where('status', 'Success')->whereYear('created_at', $year)->whereMonth('created_at','11')->count(),
            Order::where('status', 'Success')->whereYear('created_at', $year)->whereMonth('created_at','12')->count(),
        ];
        $finance = [
            Order::where('status', 'Success')->whereYear('created_at', $year)->whereMonth('created_at','1')->sum('total_payment'),
            Order::where('status', 'Success')->whereYear('created_at', $year)->whereMonth('created_at','2')->sum('total_payment'),
            Order::where('status', 'Success')->whereYear('created_at', $year)->whereMonth('created_at','3')->sum('total_payment'),
            Order::where('status', 'Success')->whereYear('created_at', $year)->whereMonth('created_at','4')->sum('total_payment'),
            Order::where('status', 'Success')->whereYear('created_at', $year)->whereMonth('created_at','5')->sum('total_payment'),
            Order::where('status', 'Success')->whereYear('created_at', $year)->whereMonth('created_at','6')->sum('total_payment'),
            Order::where('status', 'Success')->whereYear('created_at', $year)->whereMonth('created_at','7')->sum('total_payment'),
            Order::where('status', 'Success')->whereYear('created_at', $year)->whereMonth('created_at','8')->sum('total_payment'),
            Order::where('status', 'Success')->whereYear('created_at', $year)->whereMonth('created_at','9')->sum('total_payment'),
            Order::where('status', 'Success')->whereYear('created_at', $year)->whereMonth('created_at','10')->sum('total_payment'),
            Order::where('status', 'Success')->whereYear('created_at', $year)->whereMonth('created_at','11')->sum('total_payment'),
            Order::where('status', 'Success')->whereYear('created_at', $year)->whereMonth('created_at','12')->sum('total_payment'),
        ];
        return view('admin.dashboard.index', compact('processing', 'success', 'cancel', 'expired', 'minYear', 'year', 'orders', 'finance'));
    }
}
