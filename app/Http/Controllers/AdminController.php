<?php

namespace App\Http\Controllers;


use App\Models\Order;
use App\Models\SalsabilaOrder;
use App\Models\SalsabilaService;
use App\Models\User;

class AdminController extends Controller
{
    public function index()
    {
        if (session('loginRole') !== 'admin') {
            abort(403, 'Akses ditolak. Hanya untuk admin.');
        }

        $totalServices = SalsabilaService::count();
        $totalOrders = SalsabilaOrder::count();
        $totalUsers = User::where('role', 'user')->count();

        return view('admin.dashboard', compact('totalServices', 'totalOrders', 'totalUsers'));
    }
}
