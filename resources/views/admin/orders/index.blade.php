@extends('layouts.admin')

@section('title', 'Daftar Pesanan')

@section('content')
    <h2 style="margin-bottom: 20px;">📦 Daftar Pesanan Pelanggan</h2>

    @if (session('success'))
        <div style="background: #e0f7fa; padding: 12px 18px; border-left: 5px solid #00796b; color: #004d40; margin-bottom: 20px;">
            {{ session('success') }}
        </div>
    @endif

    @if ($orders->count())
        <table width="100%" cellpadding="10" style="
            border-collapse: collapse;
            background-color: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 2px 6px rgba(0,0,0,0.1);
        ">
            <thead style="background-color: #fce4ec;">
                <tr style="text-align: left;">
                    <th style="padding: 12px;">Nama Pelanggan</th>
                    <th style="padding: 12px;">Layanan</th>
                    <th style="padding: 12px;">Jumlah</th>
                    <th style="padding: 12px;">Total Harga</th>
                    <th style="padding: 12px;">Status</th>
                    <th style="padding: 12px;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    @php
                        $status = strtolower($order->status);
                        $statusLabel = ucfirst($status);
                        $statusClass = match($status) {
                            'pending' => 'bg-orange-100 text-orange-800',
                            'proses' => 'bg-blue-100 text-blue-800',
                            'selesai' => 'bg-green-100 text-green-800',
                            default => 'bg-gray-100 text-gray-800',
                        };
                    @endphp
                    <tr style="border-top: 1px solid #eee;">
                        <td style="padding: 12px;">{{ $order->user->name ?? '-' }}</td>
                        <td style="padding: 12px;">{{ $order->service->name ?? '-' }}</td>
                        <td style="padding: 12px;">{{ $order->quantity }}</td>
                        <td style="padding: 12px;">Rp {{ number_format($order->total_price, 0, ',', '.') }}</td>
                        <td style="padding: 12px;">
                            <span class="px-3 py-1 rounded text-sm font-semibold {{ $statusClass }}">
                                {{ $statusLabel }}
                            </span>
                        </td>
                        <td style="padding: 12px;">
                            <a href="/admin/orders/{{ $order->id }}/edit" style="
                                background-color: #42a5f5;
                                color: white;
                                padding: 6px 12px;
                                border-radius: 6px;
                                text-decoration: none;
                                font-size: 14px;
                            ">
                                ✏️ Ubah Status
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p style="color: #999;">Belum ada pesanan.</p>
    @endif
@endsection
