<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('voucher_id')->constrained('vouchers');
            $table->string('inv')->nullable();
            $table->string('code');
            $table->string('plan_name');
            $table->string('name');
            $table->string('wa');
            $table->bigInteger('total_payment');
            $table->enum('status', ['Process', 'Success', 'Cancel', 'Expired', 'Refund']);
            $table->string('snap_token');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
