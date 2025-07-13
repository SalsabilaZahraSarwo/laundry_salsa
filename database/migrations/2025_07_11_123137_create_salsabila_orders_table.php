<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('salsabila_orders', function (Blueprint $table) {
            $table->id();

            // Relasi ke tabel users dan services
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('service_id')->constrained('salsabila_services')->onDelete('cascade');

            // Detail pesanan
            $table->integer('quantity');
            $table->decimal('total_price', 10, 2)->nullable();
            $table->string('status')->default('pending'); // pending, process, done
            $table->dateTime('order_date')->default(now());

            // Informasi penerima
            $table->string('receiver_name')->nullable();
            $table->string('phone')->nullable();
            $table->text('address')->nullable();
            $table->text('notes')->nullable();

            // ✅ Jadwal penjemputan dan pengantaran
            $table->dateTime('pickup_time')->nullable();
            $table->dateTime('delivery_time')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('salsabila_orders');
    }
};
