@extends('layouts.admin')

@section('title', 'Dashboard Admin')

@section('content')
    <h3>Halo, {{ session('loginName') }} 👋</h3>
    <p>Selamat datang di halaman dashboard admin Laundry Pinki.</p>

    <div style="margin-top: 30px;">
        <ul>
            <li>Total Layanan: (nanti kita hitung)</li>
            <li>Total Pesanan: (belum dibuat)</li>
            <li>Total User: (opsional)</li>
        </ul>
    </div>
@endsection
