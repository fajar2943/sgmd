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
        Schema::create('vouchers', function (Blueprint $table) {
            $table->id();
            $table->string('import_id')->nullable();
            $table->string('login');
            $table->string('password');
            $table->string('plan');
            $table->string('validity')->nullable();
            $table->string('bandwidth')->nullable();
            $table->bigInteger('price');
            $table->string('type')->nullable();
            $table->enum('status', ['Available', 'Process', 'Sold', 'Refund', 'Deleted']);
            $table->dateTime('order_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vouchers');
    }
};
