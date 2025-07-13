@extends('layouts')

@section('title', 'Register - Pinki Laundry')

@section('content')
<div style="max-width: 420px; margin: 0 auto; text-align: center;">
    <h2 style="color: #c2185b; margin-bottom: 20px;">Register</h2>

    <form method="POST" action="/register" style="text-align: left;">
        @csrf

        <label for="name" style="display: block; margin-bottom: 6px;">Nama Lengkap</label>
        <input type="text" id="name" name="name" required
            style="width: 100%; padding: 10px; border-radius: 8px; border: 1px solid #ccc; margin-bottom: 16px;">

        <label for="email" style="display: block; margin-bottom: 6px;">Email</label>
        <input type="email" id="email" name="email" required
            style="width: 100%; padding: 10px; border-radius: 8px; border: 1px solid #ccc; margin-bottom: 16px;">

        <label for="password" style="display: block; margin-bottom: 6px;">Password</label>
        <input type="password" id="password" name="password" required
            style="width: 100%; padding: 10px; border-radius: 8px; border: 1px solid #ccc; margin-bottom: 20px;">

        <button type="submit" class="btn-pink" style="width: 100%;">Daftar</button>
    </form>

    <p style="margin-top: 16px;">
        Sudah punya akun?
        <a href="/login" class="link">Login di sini</a>
    </p>
</div>
@endsection
