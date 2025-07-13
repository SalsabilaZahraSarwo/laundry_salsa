@extends('layouts.admin')

@section('title', 'Detail Pesanan')

@section('content')
<div class="container">
    <h3 class="mb-4">Detail Pesanan</h3>

    <table class="table">
        <tr><th>Nama Pemesan</th><td>{{ $order->user->name }}</td></tr>
        <tr><th>Layanan</th><td>{{ $order->service->name }}</td></tr>
        <tr><th>Jumlah</th><td>{{ $order->quantity }}</td></tr>
        <tr><th>Total Harga</th><td>Rp{{ number_format($order->total_price, 0, ',', '.') }}</td></tr>
        <tr><th>Status Pesanan</th><td>{{ ucfirst($order->status) }}</td></tr>
        <tr><th>Alamat</th><td>{{ $order->address }}</td></tr>
        <tr><th>No HP</th><td>{{ $order->phone }}</td></tr>
        <tr><th>Catatan</th><td>{{ $order->notes ?? '-' }}</td></tr>
    </table>

    <h5 class="mt-4">Informasi Pembayaran</h5>
    @if ($order->payment)
        <table class="table">
            <tr><th>Metode Pembayaran</th><td>{{ ucfirst($order->payment->payment_method) }}</td></tr>
            <tr><th>Status</th>
                <td>
                    <span class="badge bg-{{ $order->payment->status == 'paid' ? 'success' : 'secondary' }}">
                        {{ ucfirst($order->payment->status) }}
                    </span>
                </td>
            </tr>
            <tr><th>Jumlah Dibayar</th><td>Rp{{ number_format($order->payment->amount_paid, 0, ',', '.') }}</td></tr>
            <tr><th>Tanggal Bayar</th><td>{{ $order->payment->paid_at ?? '-' }}</td></tr>
        </table>

        @if ($order->payment->status !== 'paid')
            <form method="POST" action="{{ route('admin.payments.confirm', $order->payment->id) }}" onsubmit="return confirm('Konfirmasi pembayaran ini?')">
                @csrf
                @method('PUT')
                <button type="submit" class="btn btn-success">Konfirmasi Pembayaran</button>
            </form>
        @endif
    @else
        <p class="text-danger">Belum ada data pembayaran untuk pesanan ini.</p>
    @endif

    <a href="{{ url('/admin/orders') }}" class="btn btn-secondary mt-3">← Kembali</a>
</div>
@endsection
