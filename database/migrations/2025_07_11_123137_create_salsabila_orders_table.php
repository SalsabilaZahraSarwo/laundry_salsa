<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('salsabila_orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->constrained('salsabila_customers')->onDelete('cascade');
            $table->foreignId('service_id')->constrained('salsabila_services')->onDelete('cascade');
            $table->dateTime('order_date')->default(now());
            $table->string('status')->default('pending'); // pending, process, done
            $table->decimal('total_price', 10, 2)->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('salsabila_orders');
    }
};

