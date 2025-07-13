@extends('layouts.user')

@section('title', 'Riwayat Pesanan')

@section('content')
<div class="container mt-5 mb-5">
    <h2 class="mb-4 fw-bold" style="color: #e91e63;">📋 Riwayat Pesanan Anda</h2>

    @if ($orders->isEmpty())
        <div class="alert alert-warning shadow-sm" style="background: #fce4ec; color: #c2185b;">
            Belum ada pesanan yang dibuat.
        </div>
    @else
        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle shadow-sm table-pink">
                <thead class="text-center">
                    <tr>
                        <th>Layanan</th>
                        <th>Jumlah</th>
                        <th>Total</th>
                        <th>Status Pesanan</th>
                        <th>Metode Pembayaran</th>
                        <th>Status Pembayaran</th>
                        <th>Tanggal Bayar</th>
                        <th>Tanggal Pesan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        <tr>
                            <td>{{ $order->service->name }}</td>
                            <td class="text-center">{{ $order->quantity }} kg</td>
                            <td>Rp {{ number_format($order->total_price, 0, ',', '.') }}</td>
                            <td class="text-center">
                                <span class="badge 
                                    {{ $order->status === 'pending' ? 'bg-warning text-dark' : 
                                       ($order->status === 'proses' ? 'bg-info text-dark' : 
                                       ($order->status === 'selesai' ? 'bg-success' : 'bg-secondary') ) }}">
                                    {{ ucfirst($order->status) }}
                                </span>
                            </td>
                            <td class="text-center">
                                {{ $order->payment?->payment_method 
                                    ? ucfirst($order->payment->payment_method) 
                                    : '-' }}
                            </td>
                            <td class="text-center">
                                <span class="badge 
                                    {{ $order->payment?->status === 'paid' ? 'bg-success' : 
                                       ($order->payment?->status === 'unpaid' ? 'bg-danger' : 'bg-secondary') }}">
                                    {{ ucfirst($order->payment?->status ?? '-') }}
                                </span>
                            </td>
                            <td class="text-center">
                                {{ $order->payment?->paid_at 
                                    ? \Carbon\Carbon::parse($order->payment->paid_at)->format('d M Y') 
                                    : '-' }}
                            </td>
                            <td class="text-center">
                                {{ $order->created_at->format('d M Y') }}
                            </td>
                            <td class="text-center">
                                <a href="{{ route('orders.show', $order->id) }}" 
                                   class="btn btn-sm btn-outline-pink rounded-pill px-3 py-1">
                                    🔍 Detail
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif

    {{-- Tombol Kembali di Bawah --}}
    <div class="text-center mt-5">
        <a href="{{ url()->previous() }}" class="btn btn-outline-pink rounded-pill px-4 py-2">
            🔙 Kembali ke Halaman Sebelumnya
        </a>
    </div>
</div>
@endsection
