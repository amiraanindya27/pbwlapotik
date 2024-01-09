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
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_pembeli');
            $table->unsignedBigInteger('id_obat');
            $table->string('tanggal', 50);
            $table->unsignedBigInteger('id_user');
            $table->string('keterangan', 100);
            $table->foreign('id_pembeli')->references('id')->on('pembelis');
            $table->foreign('id_obat')->references('id')->on('obats');
            $table->foreign('id_user')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksis');
    }
};
