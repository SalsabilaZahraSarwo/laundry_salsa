<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        // Cek apakah yang login role-nya adalah 'admin'
        if (session('loginRole') !== 'admin') {
            // Jika bukan admin, tolak akses
            return abort(403, 'Akses ditolak. Halaman ini hanya untuk admin.');
        }

        // Jika admin, lanjut tampilkan dashboard
        return view('admin.dashboard');
    }
}
