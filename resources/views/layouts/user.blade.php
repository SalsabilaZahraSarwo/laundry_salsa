<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Halaman User')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Optional: Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background-color: #fef1f6;
            font-family: 'Segoe UI', sans-serif;
        }

        .container {
            margin-top: 40px;
        }

        .card {
            border-radius: 12px;
        }

        .card-header {
            border-radius: 12px 12px 0 0;
        }

        /* Tombol outline pink */
        .btn-outline-pink {
            color: #e91e63;
            border: 1px solid #e91e63;
            background-color: transparent;
        }

        .btn-outline-pink:hover {
            background-color: #e91e63;
            color: #fff;
        }

        /* Tema untuk tabel pesanan */
        .table-pink thead {
        background-color: #f8bbd0;
        color: #880e4f;
    }

    .table-pink tbody tr:nth-child(odd) {
        background-color: #fff0f5;
    }

    .table-pink tbody tr:nth-child(even) {
        background-color: #fce4ec;
    }

    .table-pink th, .table-pink td {
        border-color: #f48fb1;
    }
    </style>
</head>
<body>

    <div class="container">
        @yield('content')
    </div>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
