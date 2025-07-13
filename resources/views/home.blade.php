@extends('layouts')

@section('title', 'Beranda - Laundry Pinki')

@section('content')
<div class="modern-hero">
    <div class="hero-overlay-modern">
        <h1 class="main-heading">🧺 Laundry Berkualitas di Kota Anda</h1>
        <p class="sub-heading">Kami peduli dengan kebersihan dan kenyamanan pakaian Anda</p>
        <a href="/order" class="btn-modern">🔍 Lihat Layanan</a>
    </div>
</div>

{{-- Promo & Layanan dalam 1 section dengan background --}}
<section class="section-wrapper-promo-layanan">
    {{-- Promo Slider --}}
    <div class="promo-container">
        <h2 class="promo-title">🎁 Promo Menarik Untuk Anda</h2>
        <div id="promoSlider" class="promo-slider">
            <div class="promo-item">🔥 Diskon 10% hingga <strong>31 Juli</strong> untuk semua layanan!</div>
            <div class="promo-item">🚛 Gratis antar-jemput untuk minimal order <strong>5kg</strong></div>
            <div class="promo-item">👨‍👩‍👧 Paket hemat keluarga 10kg cuma <strong>Rp60.000</strong></div>
        </div>
    </div>

    {{-- Layanan --}}
    <div class="container-modern">
        <h2 class="section-title-modern">🧾 Layanan Kami</h2>
        <div class="service-grid-modern">
            @foreach ($services as $service)
                <div class="card-modern">
                    @if ($service->image)
                        <img src="{{ asset('uploads/services/' . $service->image) }}" alt="{{ $service->name }}" class="img-modern">
                    @else
                        <div class="img-placeholder">Gambar Tidak Ada</div>
                    @endif
                    <h3>{{ $service->name }}</h3>
                    <p class="desc-modern">{{ $service->description }}</p>
                    <p class="price-modern">💰 Rp {{ number_format($service->price, 0, ',', '.') }}/kg</p>
                    <a href="/order" class="btn-order">🛒 Pesan Sekarang</a>
                </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Informasi Kontak --}}
<section class="contact-section">
    <h2 class="section-title-modern">📞 Kontak Kami</h2>
    <p><strong>📍 Alamat:</strong> Jl. Melati No. 27, Surabaya</p>
    <p><strong>📱 WhatsApp:</strong> <a href="https://wa.me/6281234567890" target="_blank">0812-3456-7890</a></p>
    <p><strong>✉️ Email:</strong> <a href="mailto:laundrypinki@gmail.com">laundrypinki@gmail.com</a></p>
</section>

{{-- STYLE --}}
<style>
body {
    font-family: 'Segoe UI', sans-serif;
    background: #fff1f6;
    margin: 0;
    padding: 0;
}
a { text-decoration: none; }

/* HERO */
.modern-hero {
    background: url('/images/bg-laundry.jpg') center center/cover no-repeat;
    height: 55vh;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    border-radius: 0;
    margin: 0;
    width: 100%;
}
.hero-overlay-modern {
    background: rgba(255, 105, 180, 0.75); /* Pink transparan */
    padding: 40px;
    border-radius: 20px;
    max-width: 720px;
    text-align: center;
}
.main-heading {
    font-size: 2.5rem;
    font-weight: 800;
    margin-bottom: 18px;
}
.sub-heading {
    font-size: 1.2rem;
    margin-bottom: 25px;
}
.btn-modern {
    background-color: #3f51b5;
    color: white;
    padding: 12px 24px;
    border-radius: 10px;
    font-weight: 600;
    transition: background-color 0.3s;
}
.btn-modern:hover {
    background-color: #303f9f;
}

/* SECTION PROMO + LAYANAN */
.section-wrapper-promo-layanan {
    background: #fff1f6;
    padding: 60px 30px;
    width: 100%;
}

/* PROMO */
.promo-container {
    text-align: center;
    margin-bottom: 50px;
}
.promo-title {
    font-size: 2.3rem;
    font-weight: bold;
    color: #d81b60;
    margin-bottom: 20px;
}
.promo-slider {
    background: #fce4ec;
    padding: 40px;
    border-radius: 20px;
    min-height: 160px;
    font-size: 1.4rem;
    color: #880e4f;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.06);
}
.promo-item { display: none; }
.promo-item.active { display: block; }

/* LAYANAN */
.container-modern {
    max-width: 1200px;
    margin: 0 auto;
}
.section-title-modern {
    font-size: 2rem;
    text-align: center;
    color: #3f51b5;
    margin-bottom: 40px;
}
.service-grid-modern {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 30px;
}
.card-modern {
    background: white;
    border-radius: 16px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
    text-align: center;
    padding: 20px;
    transition: transform 0.3s ease;
}
.card-modern:hover {
    transform: translateY(-8px);
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
}
.img-modern {
    width: 100%;
    height: 180px;
    object-fit: cover;
    border-radius: 12px;
    margin-bottom: 16px;
}
.img-placeholder {
    height: 180px;
    background: #cfd8dc;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #455a64;
    font-weight: bold;
    border-radius: 12px;
    margin-bottom: 16px;
}
.desc-modern {
    font-size: 0.95rem;
    color: #666;
    min-height: 50px;
    margin-bottom: 12px;
}
.price-modern {
    font-size: 1.1rem;
    font-weight: bold;
    color: #000;
    margin-bottom: 16px;
}
.btn-order {
    background-color: #f50057;
    color: white;
    padding: 10px 20px;
    border-radius: 8px;
    font-weight: 600;
    font-size: 0.95rem;
    transition: background-color 0.3s;
}
.btn-order:hover {
    background-color: #c51162;
}

/* KONTAK */
.contact-section {
    background: #f3f4f6;
    padding: 50px 20px;
    margin-top: 60px;
    text-align: center;
    font-size: 1.1rem;
    color: #444;
}
.contact-section a {
    color: #d81b60;
    font-weight: bold;
}

/* RESPONSIVE */
@media (max-width: 768px) {
    .main-heading { font-size: 2rem; }
    .sub-heading { font-size: 1rem; }
    .hero-overlay-modern { padding: 25px; }
    .promo-title { font-size: 1.5rem; }
    .promo-slider { font-size: 1.1rem; padding: 30px; }
}
</style>

{{-- SCRIPT PROMO SLIDER --}}
<script>
document.addEventListener('DOMContentLoaded', function () {
    const items = document.querySelectorAll('.promo-item');
    let index = 0;

    function showPromo(i) {
        items.forEach(item => item.classList.remove('active'));
        items[i].classList.add('active');
    }

    showPromo(index);
    setInterval(() => {
        index = (index + 1) % items.length;
        showPromo(index);
    }, 4000);
});
</script>
@endsection
