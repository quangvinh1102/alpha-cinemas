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
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->integer('use_point');
            $table->foreignId('seat_id')->constrained('seats');
            $table->foreignId('schedule_id')->constrained('schedule');;
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('admin_id')->constrained('admin');            ;
            $table->foreignId('voucher_id')->constrained('vouchers');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
