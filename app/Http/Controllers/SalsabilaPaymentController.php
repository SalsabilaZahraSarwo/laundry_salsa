<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SalsabilaPayment;

class SalsabilaPaymentController extends Controller
{
    public function index()
    {
        $payments = SalsabilaPayment::with('order')->latest()->get();
        return view('admin.payments.index', compact('payments'));
    }

    public function confirm($id)
    {
        $payment = SalsabilaPayment::with('order')->findOrFail($id);

        if (!$payment->order) {
            return back()->with('error', 'Order tidak ditemukan.');
        }

        $payment->amount_paid = $payment->order->total_price ?? 0;
        $payment->status = 'paid';
        $payment->paid_at = now();
        $payment->save();

        return redirect()->back()->with('success', 'Pembayaran telah dikonfirmasi.');
    }
}
