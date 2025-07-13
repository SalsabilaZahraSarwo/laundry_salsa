<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SalsabilaService;
use App\Models\SalsabilaOrder;
use App\Models\SalsabilaPayment;

class SalsabilaUserOrderController extends Controller
{
    // ✅ Tampilkan Formulir Pemesanan
    public function create()
    {
        if (!session()->has('loginId')) {
            return redirect('/login')->with('error', 'Silakan login dulu untuk memesan.');
        }

        $services = SalsabilaService::all();
        return view('user.order', compact('services'));
    }

    // ✅ Simpan Pesanan dan Tambah Pembayaran Otomatis
    public function store(Request $request)
    {
        if (!session()->has('loginId')) {
            return redirect('/login')->with('error', 'Silakan login dulu.');
        }

        // Validasi input
        $request->validate([
            'service_id'     => 'required|exists:salsabila_services,id',
            'quantity'       => 'required|integer|min:1',
            'receiver_name'  => 'required|string|max:100',
            'phone'          => 'required|string|max:20',
            'address'        => 'required|string',
            'notes'          => 'nullable|string',
            'pickup_time'    => 'nullable|date',
            'delivery_time'  => 'nullable|date',
        ]);

        // Hitung total harga
        $service = SalsabilaService::findOrFail($request->service_id);
        $total = $service->price * $request->quantity;

        // Simpan pesanan
        $order = SalsabilaOrder::create([
            'user_id'       => session('loginId'),
            'service_id'    => $service->id,
            'quantity'      => $request->quantity,
            'total_price'   => $total,
            'status'        => 'pending',
            'receiver_name' => $request->receiver_name,
            'phone'         => $request->phone,
            'address'       => $request->address,
            'notes'         => $request->notes,
            'pickup_time'   => $request->pickup_time,
            'delivery_time' => $request->delivery_time,
        ]);

        // Simpan pembayaran otomatis
        SalsabilaPayment::create([
            'order_id'       => $order->id,
            'payment_method' => 'cash',
            'amount_paid'    => $total,
            'status'         => 'unpaid',
            'paid_at'        => null,
        ]);

        return redirect('/orders')->with('success', 'Pesanan berhasil dikirim. Silakan tunggu konfirmasi admin.');
    }

    // ✅ Menampilkan Riwayat Pesanan User
    public function index()
    {
        if (!session()->has('loginId')) {
            return redirect('/login')->with('error', 'Silakan login terlebih dahulu.');
        }

        $orders = SalsabilaOrder::with(['service', 'payment'])
                    ->where('user_id', session('loginId'))
                    ->latest()
                    ->get();

        return view('user.index', compact('orders'));
    }

    // ✅ Menampilkan Detail Pesanan
    public function show($id)
    {
        if (!session()->has('loginId')) {
            return redirect('/login')->with('error', 'Silakan login terlebih dahulu.');
        }

        $order = SalsabilaOrder::with(['service', 'payment'])
                    ->where('id', $id)
                    ->where('user_id', session('loginId')) // hanya pemilik pesanan yang bisa lihat
                    ->firstOrFail();

        return view('user.show', compact('order'));
    }
}
