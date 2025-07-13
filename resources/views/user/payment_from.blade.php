@extends('layouts.app')

@section('title', 'Pembayaran Order #' . $order->id)

@section('content')
<div class="container mt-5">
    <h3>Pembayaran untuk Order #{{ $order->id }}</h3>

    <p>Total Bayar: <strong>Rp {{ number_format($order->total_price) }}</strong></p>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ url('/payment/' . $order->id) }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="payment_method" class="form-label">Metode Pembayaran</label>
            <select name="payment_method" id="payment_method" class="form-select" required>
                <option value="">-- Pilih Metode --</option>
                <option value="cash">Cash</option>
                <option value="transfer">Transfer Bank</option>
                <option value="e-wallet">E-Wallet</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="payment_proof" class="form-label">Upload Bukti Pembayaran (opsional)</label>
            <input type="file" name="payment_proof" id="payment_proof" class="form-control" accept=".jpg,.jpeg,.png,.pdf">
        </div>

        <button type="submit" class="btn btn-primary">Kirim Pembayaran</button>
    </form>
</div>
@endsection
