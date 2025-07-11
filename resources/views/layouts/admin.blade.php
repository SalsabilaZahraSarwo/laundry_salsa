<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Admin | Laundry Pinki')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- Icons CDN --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <style>
        :root {
            --primary: #ec407a;
            --primary-dark: #c2185b;
            --light: #fff0f5;
            --text: #333;
            --bg: #f8f8f8;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: var(--bg);
        }

        .wrapper {
            display: flex;
            height: 100vh;
            overflow: hidden;
        }

        .sidebar {
            width: 230px;
            background-color: var(--primary);
            color: white;
            padding: 30px 20px;
            display: flex;
            flex-direction: column;
        }

        .sidebar h2 {
            font-size: 20px;
            margin-bottom: 40px;
        }

        .nav-link {
            color: white;
            text-decoration: none;
            margin-bottom: 20px;
            font-weight: 500;
            display: flex;
            align-items: center;
        }

        .nav-link i {
            margin-right: 10px;
            font-size: 1.1rem;
        }

        .nav-link:hover {
            text-decoration: underline;
        }

        .logout-btn {
            margin-top: auto;
            margin-bottom: 10px;
            background-color: white;
            color: var(--primary-dark);
            text-align: center;
            padding: 10px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: bold;
        }

        .logout-btn:hover {
            background-color: var(--light);
        }

        .main {
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .topbar {
            background-color: white;
            padding: 20px 30px;
            box-shadow: 0 1px 4px rgba(0,0,0,0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .topbar h3 {
            color: var(--primary-dark);
        }

        .main-content {
            padding: 30px;
            overflow-y: auto;
            background-color: #fff;
            border-radius: 10px;
            margin: 20px;
        }
    </style>
</head>
<body>

<div class="wrapper">

    <div class="sidebar">
        <h2><i class="bi bi-droplet-half"></i> Laundry Pinki</h2>
        <a class="nav-link" href="/admin/dashboard"><i class="bi bi-house-door-fill"></i> Dashboard</a>
        <a class="nav-link" href="/admin/services"><i class="bi bi-box-seam"></i> Layanan</a>
        <a class="nav-link" href="/admin/orders"><i class="bi bi-bag-fill"></i> Pesanan</a>
        <a class="nav-link" href="/admin/payments"><i class="bi bi-credit-card"></i> Pembayaran</a>
        <a class="nav-link" href="/admin/customers"><i class="bi bi-people-fill"></i> Pelanggan</a>
        <a href="/logout" class="logout-btn"><i class="bi bi-box-arrow-right"></i> Logout</a>
    </div>

    <div class="main">
        <div class="topbar">
            <h3>@yield('title')</h3>
            <div>👤 {{ session('loginName') }}</div>
        </div>

        <div class="main-content">
            @yield('content')
        </div>
    </div>

</div>

</body>
</html>
