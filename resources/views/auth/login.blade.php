@extends('layouts')

@section('title', 'Login - Pinki Laundry')

@section('content')
<div style="max-width: 420px; margin: 0 auto; text-align: center;">
    <h2 style="color: #c2185b; margin-bottom: 20px;">Login</h2>

    <form method="POST" action="/login" style="text-align: left;">
        @csrf

        <label for="email" style="display: block; margin-bottom: 6px;">Email</label>
        <input type="email" id="email" name="email" required style="width: 100%; padding: 10px; border-radius: 8px; border: 1px solid #ccc; margin-bottom: 16px;">

        <label for="password" style="display: block; margin-bottom: 6px;">Password</label>
        <input type="password" id="password" name="password" required style="width: 100%; padding: 10px; border-radius: 8px; border: 1px solid #ccc; margin-bottom: 20px;">

        <button type="submit" class="btn-pink" style="width: 100%;">Login</button>
    </form>

    <p style="margin-top: 16px;">
        Belum punya akun?
        <a href="/register" class="link">Daftar Sekarang</a>
    </p>
</div>
@endsection
