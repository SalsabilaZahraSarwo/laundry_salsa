<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SalsabilaPayment extends Model
{
    protected $fillable = [
        'order_id', 'payment_method', 'amount_paid', 'status', 'paid_at',
    ];

    public function order()
    {
        return $this->belongsTo(SalsabilaOrder::class, 'order_id');
    }
}



