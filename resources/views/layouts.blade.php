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
            --bg-light: #fff0f5;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: var(--bg-light);
            color: var(--text-dark);
        }

        header {
            background-color: var(--pink-primary);
            padding: 20px 30px;
            color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        header h2 {
            font-weight: bold;
        }

        nav a {
            color: white;
            margin-left: 20px;
            text-decoration: none;
            font-weight: bold;
        }

        nav a:hover {
            text-decoration: underline;
        }

        .container {
            max-width: 480px;
            margin: 40px auto;
            background-color: white;
            border-radius: 12px;
            padding: 30px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
        }

        .btn-pink {
            background-color: var(--pink-primary);
            border: none;
            color: white;
            padding: 10px 20px;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.2s;
        }

        .btn-pink:hover {
            background-color: var(--pink-dark);
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-top: 8px;
            margin-bottom: 16px;
            border: 1px solid #ccc;
            border-radius: 8px;
        }

        .alert {
            background-color: var(--pink-light);
            color: var(--pink-dark);
            padding: 10px;
            margin-bottom: 20px;
            border-left: 5px solid var(--pink-primary);
            border-radius: 5px;
        }

        footer {
            text-align: center;
            padding: 20px;
            margin-top: 40px;
            background-color: #f8bbd0;
            color: #880e4f;
        }

        .text-center {
            text-align: center;
        }

        a.link {
            color: var(--pink-primary);
            text-decoration: none;
            font-weight: bold;
        }

        a.link:hover {
            text-decoration: underline;
        }

    </style>
</head>
<body>

<header>
    <h2>Laundry Pinki</h2>
    <nav>
        <a href="/">Home</a>
        <a href="/services">Layanan</a>
        @if (session()->has('loginId'))
            <a href="/logout">Logout</a>
        @else
            <a href="/login">Login</a>
            <a href="/register">Register</a>
        @endif
    </nav>
</header>

<div class="container">
    @if (session('success'))
        <div class="alert">{{ session('success') }}</div>
    @endif

    @if (session('error'))
        <div class="alert">{{ session('error') }}</div>
    @endif

    @yield('content')
</div>

<footer>
    &copy; {{ date('Y') }} Laundry Pinki • Salsabila Zahra
</footer>

</body>
</html>
