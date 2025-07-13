<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Laundry Pinki')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        :root {
            --pink-primary: #ec407a;
            --pink-light: #fce4ec;
            --pink-dark: #c2185b;
            --text-dark: #333;
            --bg-light: #fff8fb;
            --shadow-light: rgba(0, 0, 0, 0.08);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: var(--bg-light);
            color: var(--text-dark);
            line-height: 1.7;
        }

        header {
            background-color: var(--pink-primary);
            color: white;
            padding: 24px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 6px var(--shadow-light);
        }

        header h2 {
            font-size: 1.8rem;
            font-weight: bold;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        header h2::before {
            content: "🧺";
            font-size: 1.5rem;
        }

        nav a {
            color: white;
            margin-left: 28px;
            font-weight: bold;
            text-decoration: none;
            font-size: 1rem;
            position: relative;
            padding-bottom: 4px;
        }

        nav a:hover::after {
            content: '';
            position: absolute;
            width: 100%;
            height: 2px;
            background-color: white;
            left: 0;
            bottom: 0;
        }

        .container {
            max-width: 1140px;
            margin: 60px auto;
            padding: 40px;
            background-color: white;
            border-radius: 20px;
            box-shadow: 0 10px 24px var(--shadow-light);
            animation: fadeIn 0.5s ease-in-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .btn-pink {
            background-color: var(--pink-primary);
            color: white;
            padding: 12px 22px;
            border-radius: 10px;
            text-decoration: none;
            font-weight: bold;
            display: inline-block;
            transition: background-color 0.3s ease, transform 0.2s ease;
            margin-top: 12px;
        }

        .btn-pink:hover {
            background-color: var(--pink-dark);
            transform: scale(1.05);
        }

        footer {
            background-color: #f8bbd0;
            color: #880e4f;
            text-align: center;
            padding: 30px 10px;
            margin-top: 60px;
            font-size: 0.95rem;
            border-top: 3px dashed #ec407a;
        }

        .text-center {
            text-align: center;
        }

        .alert {
            background-color: var(--pink-light);
            color: var(--pink-dark);
            padding: 16px 24px;
            margin-bottom: 32px;
            border-left: 5px solid var(--pink-primary);
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.05);
        }

        .section-space {
            margin-bottom: 40px;
        }

        @media (max-width: 768px) {
            .container {
                margin: 40px 16px;
                padding: 28px;
            }

            header {
                flex-direction: column;
                align-items: flex-start;
                gap: 12px;
            }

            nav a {
                margin: 6px 12px 0 0;
                display: inline-block;
            }
        }
    </style>
</head>
<body>

<header>
    <h2>Pinki Laundry</h2>
    <nav>
        <a href="/">Home</a>
        <a href="/order">Pesan</a>
        <a href="/orders">Pesanan</a>
        @if (session()->has('loginId'))
            <a href="/logout">Logout</a>
        @else
            <a href="/login">Login</a>
            <a href="/register">Register</a>
        @endif
    </nav>
</header>

<div class="container">
    {{-- Flash Message --}}
    @if (session('success'))
        <div class="alert">✅ {{ session('success') }}</div>
    @endif

    @if (session('error'))
        <div class="alert">❌ {{ session('error') }}</div>
    @endif

    {{-- Konten Halaman --}}
    @yield('content')
</div>

<footer>
    &copy; {{ date('Y') }} Laundry Pinki • Dibuat dengan 💖 oleh Salsabila Zahra
</footer>

</body>
</html>
