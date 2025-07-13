@extends('layouts.app')

@section('title', 'Layanan Laundry')

@section('content')
    <h2 style="margin-bottom: 20px;">🧼 Daftar Layanan Laundry</h2>

    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 20px;">
        @foreach ($services as $service)
            <div style="background: white; border-radius: 12px; padding: 16px; box-shadow: 0 2px 6px rgba(0,0,0,0.05); text-align: center;">
                @if ($service->image)
                    <img src="{{ asset('uploads/services/' . $service->image) }}" width="100%" style="border-radius: 10px;">
                @endif

                <h3 style="margin: 10px 0;">{{ $service->name }}</h3>
                <p>{{ $service->description }}</p>
                <p><strong>Rp {{ number_format($service->price, 0, ',', '.') }}</strong></p>

                @if (session('loginId'))
                    <a href="/layanan/{{ $service->id }}/pesan" style="display: inline-block; margin-top: 10px; padding: 10px 20px; background-color: #ec407a; color: white; border-radius: 8px; text-decoration: none;">Pesan</a>
                @else
                    <a href="/login" style="display: inline-block; margin-top: 10px; padding: 10px 20px; background-color: #ccc; color: white; border-radius: 8px; text-decoration: none;">Login untuk Pesan</a>
                @endif
            </div>
        @endforeach
    </div>
@endsection
