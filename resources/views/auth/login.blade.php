@extends('layouts')

@section('title', 'Login')

@section('content')
    <h2 class="text-center">Login</h2>
    <form method="POST" action="/login">
        @csrf
        <label>Email</label>
        <input type="email" name="email" required>

        <label>Password</label>
        <input type="password" name="password" required>

        <button type="submit" class="btn-pink">Login</button>
    </form>

    <p class="text-center" style="margin-top:20px;">
        Belum punya akun? <a href="/register" class="link">Daftar Sekarang</a>
    </p>
@endsection