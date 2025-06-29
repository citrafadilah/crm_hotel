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
        Schema::create('reservasi', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('email')->constrained('user')->onDelete('cascade');
            $table->string('nohp');
            $table->date('checkin');
            $table->date('checkout');
            $table->foreignId('room_id')->constrained('room')->onDelete('cascade');
            $table->integer('jumlah_tamu')->default(2);
            $table->string('bukti_bayar')->nullable();
            $table->enum('status', ['pending', 'confirmed', 'checkin', 'checkout', 'cancelled'])->default('pending');
            $table->integer('total')->default(0);
            $table->string('updated_by')->constrained('user')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservasi');
    }
};
