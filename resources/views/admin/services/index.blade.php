@extends('layouts.admin')

@section('title', 'Daftar Layanan')

@section('content')
    <h2 style="margin-bottom: 20px;">🧺 Daftar Layanan Laundry</h2>

    @if (session('success'))
        <div style="background: #e0f7fa; padding: 12px 18px; border-left: 5px solid #00796b; color: #004d40; margin-bottom: 20px;">
            {{ session('success') }}
        </div>
    @endif

    <div style="margin-bottom: 20px;">
        <a href="/admin/services/create" style="
            background-color: #ec407a;
            color: white;
            padding: 10px 20px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: bold;
            display: inline-block;
        ">
            + Tambah Layanan
        </a>
    </div>

    <table width="100%" cellpadding="10" style="
        border-collapse: collapse;
        background-color: white;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 2px 6px rgba(0,0,0,0.1);
    ">
        <thead style="background-color: #fce4ec;">
            <tr style="text-align: left;">
                <th style="padding: 12px;">Gambar</th>
                <th style="padding: 12px;">Nama</th>
                <th style="padding: 12px;">Deskripsi</th>
                <th style="padding: 12px;">Harga</th>
                <th style="padding: 12px;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($services as $service)
                <tr style="border-top: 1px solid #eee;">
                    <td style="padding: 12px;">
                        @if ($service->image)
                            <img src="{{ asset('uploads/services/' . $service->image) }}" width="80" style="border-radius: 8px;">
                        @else
                            <span style="color: #ccc;">Tidak ada</span>
                        @endif
                    </td>
                    <td style="padding: 12px;">{{ $service->name }}</td>
                    <td style="padding: 12px;">{{ $service->description }}</td>
                    <td style="padding: 12px;">Rp {{ number_format($service->price, 0, ',', '.') }}</td>
                    <td style="padding: 12px;">
                        <div style="display: flex; gap: 8px;">
                            <a href="/admin/services/{{ $service->id }}/edit" style="
                                background-color: #42a5f5;
                                color: white;
                                padding: 6px 12px;
                                border-radius: 6px;
                                text-decoration: none;
                                font-size: 14px;
                                display: inline-block;
                            ">
                                ✏️ Edit
                            </a>

                            <form action="/admin/services/{{ $service->id }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus layanan ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" style="
                                    background-color: #ef5350;
                                    color: white;
                                    padding: 6px 12px;
                                    border: none;
                                    border-radius: 6px;
                                    font-size: 14px;
                                    cursor: pointer;
                                ">
                                    🗑️ Hapus
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" style="text-align: center; padding: 20px; color: #999;">Belum ada layanan ditambahkan</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
