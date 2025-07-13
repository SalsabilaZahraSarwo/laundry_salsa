<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalsabilaOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'service_id',
        'quantity',
        'total_price',
        'status',
        'receiver_name',
        'phone',
        'address',
        'notes',
    ];

    /**
     * Relasi ke user (pemesan)
     */
    public function user()
   {
    return $this->belongsTo(\App\Models\User::class, 'user_id');
}

    /**
     * Relasi ke layanan laundry
     */
    public function service()
    {
        return $this->belongsTo(SalsabilaService::class, 'service_id');
    }

    /**
     * Relasi ke pembayaran
     */
    public function payment()
    {
        return $this->hasOne(SalsabilaPayment::class, 'order_id');
    }
}
