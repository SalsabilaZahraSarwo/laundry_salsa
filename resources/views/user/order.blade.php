@extends('layouts.user')

@section('title', 'Pesan Layanan Laundry')

@section('content')
<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-7 col-lg-6">
            
            {{-- Alert Sukses --}}
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert" style="background-color: #e91e63; color: white;">
                    <strong>Sukses!</strong> {{ session('success') }}
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            {{-- Alert Error --}}
            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert" style="background-color: #c2185b; color: white;">
                    <strong>Gagal!</strong> {{ session('error') }}
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="card shadow rounded-4 border-0" style="border-left: 8px solid #f48fb1;">
                <div class="card-header" style="background-color: #e91e63; color: white; border-top-left-radius: .5rem; border-top-right-radius: .5rem;">
                    <h4 class="mb-0 fw-bold">🧺 Formulir Pemesanan Layanan Laundry</h4>
                </div>
                <div class="card-body p-4" style="background: #fce4ec;">

                    <form action="/order" method="POST" novalidate>
                        @csrf

                        <div class="mb-4">
                            <label for="service_id" class="form-label fw-semibold" style="color: #ad1457;">Pilih Layanan</label>
                            <select name="service_id" id="service_id" class="form-select shadow-sm" required>
                                <option value="" disabled selected>-- Pilih layanan laundry --</option>
                                @foreach ($services as $service)
                                    <option value="{{ $service->id }}">
                                        {{ $service->name }} - Rp {{ number_format($service->price, 0, ',', '.') }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="quantity" class="form-label fw-semibold" style="color: #ad1457;">Jumlah (kg)</label>
                            <input type="number" name="quantity" id="quantity" min="1" class="form-control shadow-sm" placeholder="Masukkan jumlah berat pakaian" required>
                        </div>

                        <div class="mb-4">
                            <label for="receiver_name" class="form-label fw-semibold" style="color: #ad1457;">Nama Pemesan</label>
                            <input type="text" name="receiver_name" id="receiver_name" class="form-control shadow-sm" placeholder="Contoh: Salsabila Zahra" required>
                        </div>

                        <div class="mb-4">
                            <label for="phone" class="form-label fw-semibold" style="color: #ad1457;">Nomor HP</label>
                            <input type="tel" name="phone" id="phone" class="form-control shadow-sm" placeholder="Contoh: 08123456789" required>
                        </div>

                        <div class="mb-4">
                            <label for="address" class="form-label fw-semibold" style="color: #ad1457;">Alamat Penjemputan</label>
                            <textarea name="address" id="address" class="form-control shadow-sm" rows="3" placeholder="Contoh: Jl. Mawar No. 15, Padang" required></textarea>
                        </div>

                        <div class="mb-4">
                            <label for="pickup_schedule" class="form-label fw-semibold" style="color: #ad1457;">Jadwal Penjemputan</label>
                            <input type="datetime-local" name="pickup_schedule" id="pickup_schedule" class="form-control shadow-sm" required>
                        </div>

                        <div class="mb-4">
                            <label for="delivery_schedule" class="form-label fw-semibold" style="color: #ad1457;">Jadwal Pengantaran</label>
                            <input type="datetime-local" name="delivery_schedule" id="delivery_schedule" class="form-control shadow-sm" required>
                        </div>

                        <div class="mb-4">
                            <label for="notes" class="form-label fw-semibold" style="color: #ad1457;">Catatan Tambahan (Opsional)</label>
                            <textarea name="notes" id="notes" class="form-control shadow-sm" rows="2" placeholder="Contoh: Jemput sebelum jam 10 pagi"></textarea>
                        </div>

                        <button type="submit" class="btn btn-pink w-100 fw-bold shadow" style="background-color: #e91e63; border: none;">
                            🧼 Pesan Sekarang
                        </button>
                    </form>

                </div>
            </div>

        </div>
    </div>
</div>
@endsection
