@extends('layouts.user')

@section('title', 'Detail Pesanan #' . $order->id)

@section('content')
<div class="container mt-5">
    <h2>📦 Detail Pesanan</h2>

    <table class="table table-bordered mt-4">
        <tr>
            <th>ID Pesanan</th>
            <td>#{{ $order->id }}</td>
        </tr>
        <tr>
            <th>Layanan</th>
            <td>{{ $order->service->name }}</td>
        </tr>
        <tr>
            <th>Jumlah (kg)</th>
            <td>{{ $order->quantity }}</td>
        </tr>
        <tr>
            <th>Total Harga</th>
            <td>Rp {{ number_format($order->total_price, 0, ',', '.') }}</td>
        </tr>
        <tr>
            <th>Status Pesanan</th>
            <td>{{ ucfirst($order->status) }}</td>
        </tr>
        <tr>
            <th>Nama Penerima</th>
            <td>{{ $order->receiver_name }}</td>
        </tr>
        <tr>
            <th>Alamat</th>
            <td>{{ $order->address }}</td>
        </tr>
        <tr>
            <th>No. HP</th>
            <td>{{ $order->phone }}</td>
        </tr>
        <tr>
            <th>Catatan</th>
            <td>{{ $order->notes ?? '-' }}</td>
        </tr>
    </table>

    <h4 class="mt-5">💳 Informasi Pembayaran</h4>

    @if($order->payment)
        <table class="table table-striped mt-3">
            <tr>
                <th>Metode</th>
                <td>{{ ucfirst($order->payment->payment_method) }}</td>
            </tr>
            <tr>
                <th>Status</th>
                <td>{{ ucfirst($order->payment->status) }}</td>
            </tr>
            <tr>
                <th>Jumlah Bayar</th>
                <td>Rp {{ number_format($order->payment->amount_paid, 0, ',', '.') }}</td>
            </tr>
            <tr>
                <th>Tanggal Bayar</th>
                <td>
                    @if ($order->payment->paid_at)
                        {{ \Carbon\Carbon::parse($order->payment->paid_at)->format('d M Y H:i') }}
                    @else
                        <em>Belum dibayar</em>
                    @endif
                </td>
            </tr>
        </table>
    @else
        <div class="alert alert-warning mt-3">
            Belum ada data pembayaran untuk pesanan ini.
        </div>
    @endif

    <a href="{{ url('/orders') }}" class="btn btn-secondary mt-3">⬅ Kembali ke Riwayat</a>
</div>
@endsection
