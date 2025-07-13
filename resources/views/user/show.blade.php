@extends('layouts.user')

@section('title', 'Detail Pesanan')

@section('content')
<div class="container mt-5 mb-5">
    <div class="card shadow rounded-4 border-0" style="border-left: 6px solid #e91e63;">
        <div class="card-header" style="background-color: #e91e63; color: white;">
            <h4 class="mb-0 fw-bold">🧺 Detail Pesanan Anda</h4>
        </div>
        <div class="card-body" style="background: #fce4ec;">

            <table class="table table-borderless mb-4">
                <tr>
                    <th style="width: 200px; color: #880e4f;">Layanan</th>
                    <td>{{ $order->service->name }}</td>
                </tr>
                <tr>
                    <th style="color: #880e4f;">Jumlah</th>
                    <td>{{ $order->quantity }} kg</td>
                </tr>
                <tr>
                    <th style="color: #880e4f;">Total Harga</th>
                    <td>Rp {{ number_format($order->total_price, 0, ',', '.') }}</td>
                </tr>
                <tr>
                    <th style="color: #880e4f;">Status Pesanan</th>
                    <td>
                        <span class="badge 
                            {{ $order->status === 'pending' ? 'bg-warning text-dark' :
                               ($order->status === 'proses' ? 'bg-info text-dark' :
                               ($order->status === 'selesai' ? 'bg-success' : 'bg-secondary')) }}">
                            {{ ucfirst($order->status) }}
                        </span>
                    </td>
                </tr>
                <tr>
                    <th style="color: #880e4f;">Tanggal Pesan</th>
                    <td>{{ $order->created_at->format('d M Y') }}</td>
                </tr>
            </table>

            <hr class="my-4" style="border-top: 2px dashed #e91e63;">

            <h5 class="fw-bold mb-3" style="color: #d81b60;">📦 Informasi Penerima</h5>
            <table class="table table-borderless mb-4">
                <tr>
                    <th style="width: 200px;">Nama</th>
                    <td>{{ $order->receiver_name }}</td>
                </tr>
                <tr>
                    <th>Nomor HP</th>
                    <td>{{ $order->phone }}</td>
                </tr>
                <tr>
                    <th>Alamat</th>
                    <td>{{ $order->address }}</td>
                </tr>
                <tr>
                    <th>Catatan</th>
                    <td>{{ $order->notes ?? '-' }}</td>
                </tr>
            </table>

            <hr class="my-4" style="border-top: 2px dashed #e91e63;">

            <h5 class="fw-bold mb-3" style="color: #d81b60;">💳 Informasi Pembayaran</h5>
            @if ($order->payment)
                <table class="table table-borderless">
                    <tr>
                        <th style="width: 200px;">Metode</th>
                        <td>{{ ucfirst($order->payment->payment_method) }}</td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td>
                            <span class="badge 
                                {{ $order->payment->status === 'paid' ? 'bg-success' :
                                   ($order->payment->status === 'unpaid' ? 'bg-danger' : 'bg-secondary') }}">
                                {{ ucfirst($order->payment->status) }}
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <th>Tanggal Bayar</th>
                        <td>{{ $order->payment->paid_at ? \Carbon\Carbon::parse($order->payment->paid_at)->format('d M Y') : '-' }}</td>
                    </tr>
                    <tr>
                        <th>Jumlah Dibayar</th>
                        <td>Rp {{ number_format($order->payment->amount_paid, 0, ',', '.') }}</td>
                    </tr>
                </table>
            @else
                <div class="alert alert-warning">
                    Belum ada data pembayaran.
                </div>
            @endif

            <div class="mt-4 text-end">
                <a href="{{ url('/orders') }}" class="btn btn-outline-pink rounded-pill px-4">
                    ← Kembali ke Riwayat
                </a>
            </div>

        </div>
    </div>
</div>
@endsection
