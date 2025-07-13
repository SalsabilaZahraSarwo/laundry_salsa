<?php

namespace App\Http\Controllers;

use App\Models\SalsabilaOrder;
use App\Models\SalsabilaService;
use Illuminate\Http\Request;

class SalsabilaOrderController extends Controller
{
    // ============================
    // ADMIN: Menampilkan semua pesanan
    // ============================
    public function index()
    {
        $orders = SalsabilaOrder::with(['user', 'service'])->latest()->get();
        return view('admin.orders.index', compact('orders'));
    }

    // ============================
    // ADMIN: Menampilkan detail pesanan
    // ============================
    public function show($id)
    {
        $order = SalsabilaOrder::with(['service', 'user', 'payment'])->findOrFail($id);
        return view('admin.orders.show', compact('order'));
    }

    // ============================
    // ADMIN: Form edit status pesanan
    // ============================
    public function edit($id)
    {
        $order = SalsabilaOrder::with(['user', 'service'])->findOrFail($id);
        return view('admin.orders.edit', compact('order'));
    }

    // ============================
    // ADMIN: Simpan perubahan status
    // ============================
    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,proses,selesai',
        ]);

        $order = SalsabilaOrder::findOrFail($id);
        $order->status = $request->status;
        $order->save();

        return redirect('/admin/orders')->with('success', 'Status pesanan berhasil diperbarui.');
    }

    // ============================
    // USER: Form buat pesanan
    // ============================
    public function create($serviceId)
    {
        if (!session()->has('loginId')) {
            return redirect('/login')->with('error', 'Silakan login terlebih dahulu.');
        }

        $service = SalsabilaService::findOrFail($serviceId);
        return view('layanan.pesan', compact('service'));
    }

    // ============================
    // USER: Simpan pesanan
    // ============================
    public function store(Request $request, $serviceId)
    {
        if (!session()->has('loginId')) {
            return redirect('/login')->with('error', 'Silakan login terlebih dahulu.');
        }

        $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        $service = SalsabilaService::findOrFail($serviceId);
        $total = $service->price * $request->quantity;

        SalsabilaOrder::create([
            'user_id'     => session('loginId'),
            'service_id'  => $service->id,
            'quantity'    => $request->quantity,
            'total_price' => $total,
            'status'      => 'pending',
        ]);

        return redirect('/layanan')->with('success', 'Pesanan berhasil dibuat!');
    }

    // ============================
    // USER: Lihat riwayat pesanan
    // ============================
    public function userOrders()
    {
        if (!session()->has('loginId')) {
            return redirect('/login')->with('error', 'Silakan login terlebih dahulu.');
        }

        $orders = SalsabilaOrder::with('service')
            ->where('user_id', session('loginId'))
            ->latest()
            ->get();

        return view('user.create_orders', compact('orders'));
    }
}
