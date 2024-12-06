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
        Schema::create('manajemenkegiatan', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kegiatan', 150);
            $table->unsignedBigInteger('id_oki')->nullable();
            $table->date('tgl_kegiatan')->nullable();
            $table->string('proposal_kegiatan', 255)->nullable();
            $table->text('umpan_balik')->nullable();
            $table->enum('status_proposal', ['diproses', 'disetujui', 'ditolak'])->default('diproses');
            $table->timestamps();

            $table->foreign('id_oki')->references('id')->on('oki_baru')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('manajemenkegiatan');
    }
};
