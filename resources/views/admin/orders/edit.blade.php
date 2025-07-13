@extends('layouts.admin')

@section('title', 'Ubah Status Pesanan')

@section('content')
    <h2 style="margin-bottom: 20px;">🛠️ Ubah Status Pesanan</h2>

    <form action="/admin/orders/{{ $order->id }}" method="POST" style="background: white; padding: 20px; border-radius: 10px; max-width: 500px;">
        @csrf
        @method('PUT')

        <div style="margin-bottom: 15px;">
            <label for="status" style="display:block; margin-bottom: 5px;">Status Pesanan:</label>
            <select name="status" id="status" style="padding: 10px; width: 100%; border-radius: 6px; border: 1px solid #ccc;">
                <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="proses" {{ $order->status == 'proses' ? 'selected' : '' }}>Proses</option>
                <option value="selesai" {{ $order->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
            </select>
        </div>

        <button type="submit" style="
            background-color: #ec407a;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 8px;
            font-weight: bold;
            cursor: pointer;
        ">💾 Simpan</button>

        <a href="/admin/orders" style="
            margin-left: 15px;
            color: #666;
            text-decoration: none;
        ">Batal</a>
    </form>
@endsection
