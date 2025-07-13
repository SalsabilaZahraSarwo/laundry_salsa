@extends('layouts.admin')

@section('title', 'Dashboard Admin')

@section('content')
<div class="container py-5">
   <div class="text-center mb-5">
    <h3 class="fw-bold text-gradient mb-3" style="font-size: 2rem; line-height: 1.3;">
        Hai, Admin {{ session('loginName') }} 👋
    </h3>
    <p class="text-muted fs-5 mx-auto" style="max-width: 700px; line-height: 1.6;">
        Selamat datang di <strong>Laundry Pinki Dashboard</strong>. Pantau layanan dan pesanan dengan tampilan stylish & interaktif!
    </p>
</div>


    <div class="row g-4 justify-content-center">
        {{-- Card Total Layanan --}}
        <div class="col-xl-3 col-lg-4 col-md-6">
            <div class="card card-glass text-center p-4 shadow">
                <h5 class="text-gradient mb-4">Total Layanan</h5>
                <canvas id="servicesChart" class="chart-canvas"></canvas>
                <h2 class="fw-bold text-gradient mt-3">{{ $totalServices }}</h2>
            </div>
        </div>

        {{-- Card Total Pesanan --}}
        <div class="col-xl-3 col-lg-4 col-md-6">
            <div class="card card-glass text-center p-4 shadow">
                <h5 class="text-gradient mb-4">Total Pesanan</h5>
                <canvas id="ordersChart" class="chart-canvas"></canvas>
                <h2 class="fw-bold text-gradient mt-3">{{ $totalOrders }}</h2>
            </div>
        </div>

        {{-- Card Total User --}}
        <div class="col-xl-3 col-lg-4 col-md-6">
            <div class="card card-glass text-center p-4 shadow">
                <h5 class="text-gradient mb-4">Total User</h5>
                <canvas id="usersChart" class="chart-canvas"></canvas>
                <h2 class="fw-bold text-gradient mt-3">{{ $totalUsers }}</h2>
            </div>
        </div>
    </div>

    <div class="mt-5 d-flex justify-content-center gap-4 flex-wrap">
        <a href="{{ url('/admin/services') }}" class="btn btn-gradient btn-lg px-5">Kelola Layanan</a>
        <a href="{{ url('/admin/orders') }}" class="btn btn-outline-gradient btn-lg px-5">Kelola Pesanan</a>
    </div>
</div>
@endsection

@push('styles')
<style>
    body {
        background: linear-gradient(to right, #fdf0f4, #fff0f7);
        font-family: 'Poppins', sans-serif;
    }

    .text-gradient {
        background: linear-gradient(45deg, #d81b60, #8e24aa);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .btn-gradient {
        background: linear-gradient(45deg, #d81b60, #8e24aa);
        color: white;
        border: none;
        border-radius: 30px;
        transition: all 0.3s ease;
        font-weight: 500;
    }

    .btn-gradient:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 10px rgba(216, 27, 96, 0.4);
    }

    .btn-outline-gradient {
        border: 2px solid #d81b60;
        color: #d81b60;
        background: white;
        border-radius: 30px;
        transition: all 0.3s ease;
        font-weight: 500;
    }

    .btn-outline-gradient:hover {
        background: #d81b60;
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 4px 10px rgba(216, 27, 96, 0.4);
    }

    .card-glass {
        border-radius: 16px;
        background: rgba(255, 255, 255, 0.8);
        backdrop-filter: blur(8px);
        border: none;
        transition: all 0.3s ease;
    }

    .card-glass:hover {
        transform: translateY(-4px);
        box-shadow: 0 6px 16px rgba(216, 27, 96, 0.2);
    }

    .chart-canvas {
        max-height: 150px;
        width: 100%;
        margin: auto;
    }
</style>
@endpush

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Bar Chart - Services
    const servicesData = {
        labels: ['Cuci Basah', 'Cuci Kering', 'Setrika'],
        datasets: [{
            label: 'Jumlah',
            data: [4, 2, 3],
            backgroundColor: ['#f06292', '#ba68c8', '#ce93d8'],
            borderRadius: 8
        }]
    };

    // Pie Chart - Orders
    const ordersData = {
        labels: ['Pending', 'Proses', 'Selesai'],
        datasets: [{
            data: [1, 1, 2],
            backgroundColor: ['#f8bbd0', '#f06292', '#ab47bc'],
            hoverOffset: 20
        }]
    };

    // Line Chart - Users
    const usersData = {
        labels: ['Jan', 'Feb', 'Mar', 'Apr'],
        datasets: [{
            label: 'User Aktif',
            data: [2, 3, 4, 6],
            fill: true,
            borderColor: '#8e24aa',
            backgroundColor: 'rgba(142,36,170,0.1)',
            tension: 0.4,
            pointBackgroundColor: '#d81b60',
            pointRadius: 5
        }]
    };

    // Chart Init
    window.addEventListener('DOMContentLoaded', () => {
        new Chart(document.getElementById('servicesChart'), {
            type: 'bar',
            data: servicesData,
            options: {
                responsive: true,
                plugins: {
                    legend: { display: false }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            color: '#6a1b9a',
                            font: { weight: 'bold' }
                        }
                    },
                    x: {
                        ticks: {
                            color: '#6a1b9a',
                            font: { weight: 'bold' }
                        }
                    }
                }
            }
        });

        new Chart(document.getElementById('ordersChart'), {
            type: 'pie',
            data: ordersData,
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: {
                            color: '#6a1b9a',
                            font: { weight: 'bold', size: 13 }
                        }
                    }
                }
            }
        });

        new Chart(document.getElementById('usersChart'), {
            type: 'line',
            data: usersData,
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        labels: {
                            color: '#6a1b9a',
                            font: { weight: 'bold' }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            color: '#6a1b9a',
                            font: { weight: 'bold' }
                        }
                    },
                    x: {
                        ticks: {
                            color: '#6a1b9a',
                            font: { weight: 'bold' }
                        }
                    }
                }
            }
        });
    });
</script>
@endpush
