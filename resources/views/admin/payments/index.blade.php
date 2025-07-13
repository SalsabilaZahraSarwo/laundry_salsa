@extends('layouts.admin')

@section('title', 'Data Pembayaran')

@section('content')
    <h2 style="margin-bottom: 20px;">🧾 Daftar Pembayaran</h2>

    @if (session('success'))
        <div style="background: #e8f5e9; padding: 12px 18px; border-left: 5px solid #388e3c; color: #1b5e20; margin-bottom: 20px;">
            {{ session('success') }}
        </div>
    @endif

    @if ($payments->count())
        <table width="100%" cellpadding="10" style="
            border-collapse: collapse;
            background-color: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 2px 6px rgba(0,0,0,0.08);
        ">
            <thead style="background-color: #fce4ec;">
                <tr style="text-align: left;">
                    <th style="padding: 12px;">#</th>
                    <th style="padding: 12px;">Pelanggan</th>
                    <th style="padding: 12px;">Layanan</th>
                    <th style="padding: 12px;">Metode</th>
                    <th style="padding: 12px;">Jumlah Bayar</th>
                    <th style="padding: 12px;">Status</th>
                    <th style="padding: 12px;">Tanggal Bayar</th>
                    <th style="padding: 12px;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($payments as $payment)
                    @php
                        $status = strtolower($payment->status);
                        $statusClass = match($status) {
                            'pending' => 'badge badge-warning',
                            'paid' => 'badge badge-success',
                            'failed' => 'badge badge-danger',
                            default => 'badge badge-secondary',
                        };

                        $formattedAmount = $payment->amount_paid > 0
                            ? 'Rp ' . number_format($payment->amount_paid, 0, ',', '.')
                            : '-';

                        $tanggalBayar = $payment->paid_at
                            ? date('d M Y, H:i', strtotime($payment->paid_at))
                            : '-';
                    @endphp
                    <tr style="border-top: 1px solid #eee;">
                        <td style="padding: 12px;">{{ $loop->iteration }}</td>
                        <td style="padding: 12px;">{{ $payment->order->user->name ?? '-' }}</td>
                        <td style="padding: 12px;">{{ $payment->order->service->name ?? '-' }}</td>
                        <td style="padding: 12px;">{{ ucfirst($payment->payment_method) }}</td>
                        <td style="padding: 12px;">{{ $formattedAmount }}</td>
                        <td style="padding: 12px;">
                            <span class="{{ $statusClass }}">
                                {{ ucfirst($payment->status) }}
                            </span>
                        </td>
                        <td style="padding: 12px;">{{ $tanggalBayar }}</td>
                        <td style="padding: 12px;">
                            @if ($payment->status !== 'paid')
                                <form action="{{ route('payments.confirm', $payment->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" style="background-color: #4caf50; color: white; border: none; padding: 6px 12px; border-radius: 6px; font-size: 13px;">
                                        Konfirmasi
                                    </button>
                                </form>
                            @else
                                <span style="color: #4caf50; font-weight: 600;">✔️</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p style="color: #888;">Belum ada data pembayaran.</p>
    @endif
@endsection
