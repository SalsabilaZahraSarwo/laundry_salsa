@extends('layouts.admin')

@section('title', 'Edit Layanan')

@section('content')
    <h2 style="margin-bottom: 20px; color: #d81b60;">✏️ Edit Layanan Laundry</h2>

    <form method="POST" action="/admin/services/{{ $service->id }}" enctype="multipart/form-data" style="
        background: #fff;
        padding: 30px;
        border-radius: 12px;
        max-width: 600px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.05);
    ">
        @csrf

        <div style="margin-bottom: 20px;">
            <label style="font-weight: bold; color: #555;">Nama Layanan</label><br>
            <input type="text" name="name" value="{{ $service->name }}" required style="
                width: 100%;
                padding: 10px;
                border: 1px solid #ccc;
                border-radius: 8px;
                margin-top: 6px;
            ">
        </div>

        <div style="margin-bottom: 20px;">
            <label style="font-weight: bold; color: #555;">Deskripsi</label><br>
            <textarea name="description" rows="4" style="
                width: 100%;
                padding: 10px;
                border: 1px solid #ccc;
                border-radius: 8px;
                margin-top: 6px;
                resize: vertical;
            ">{{ $service->description }}</textarea>
        </div>

        <div style="margin-bottom: 20px;">
            <label style="font-weight: bold; color: #555;">Harga (Rp)</label><br>
            <input type="number" name="price" value="{{ $service->price }}" required style="
                width: 100%;
                padding: 10px;
                border: 1px solid #ccc;
                border-radius: 8px;
                margin-top: 6px;
            ">
        </div>

        <div style="margin-bottom: 20px;">
            <label style="font-weight: bold; color: #555;">Gambar Lama</label><br>
            @if ($service->image)
                <img src="{{ asset('uploads/services/' . $service->image) }}" width="150" style="margin-top: 8px; border-radius: 8px;"><br>
            @else
                <em style="color: #999;">Tidak ada gambar</em><br>
            @endif
        </div>

        <div style="margin-bottom: 25px;">
            <label style="font-weight: bold; color: #555;">Ganti Gambar (opsional)</label><br>
            <input type="file" name="image" accept="image/*" style="margin-top: 6px;">
        </div>

        <button type="submit" style="
            background-color: #d81b60;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
        ">
            💾 Update Layanan
        </button>
    </form>
@endsection
