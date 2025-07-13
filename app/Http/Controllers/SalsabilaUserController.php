<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SalsabilaService;

class SalsabilaUserController extends Controller
{
    public function publicHome()
    {
        $services = SalsabilaService::all();
        return view('home', compact('services'));
    }
}
