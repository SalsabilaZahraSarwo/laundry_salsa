<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('salsabila_payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained('salsabila_orders')->onDelete('cascade');
            $table->string('payment_method'); // contoh: cash, transfer, e-wallet
            $table->decimal('amount_paid', 10, 2);
            $table->enum('status', ['paid', 'unpaid', 'pending'])->default('pending');
            $table->dateTime('paid_at')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('salsabila_payments');
    }
};
