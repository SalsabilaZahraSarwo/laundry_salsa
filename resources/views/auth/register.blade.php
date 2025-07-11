@extends('layouts')

@section('title', 'Register')

@section('content')
    <h2 class="text-center">Register</h2>
    <form method="POST" action="/register">
        @csrf
        <label>Nama Lengkap</label>
        <input type="text" name="name" required>

        <label>Email</label>
        <input type="email" name="email" required>

        <label>Password</label>
        <input type="password" name="password" required>

        <button type="submit" class="btn-pink">Daftar</button>
    </form>

    <p class="text-center" style="margin-top:20px;">
        Sudah punya akun? <a href="/login" class="link">Login di sini</a>
    </p>
@endsection