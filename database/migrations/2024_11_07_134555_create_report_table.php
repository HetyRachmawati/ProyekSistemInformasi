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
        Schema::create('report', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_oki')->nullable(); 
            $table->unsignedBigInteger('id_kegiatan'); 
            $table->text('manfaat')->nullable();
            $table->text('hasil_pelaksanaan')->nullable();
            $table->text('evaluasi')->nullable();
            $table->text('saran')->nullable();
            $table->date('tgl_pelaksanaan')->nullable();
            $table->string('file_lpj', 255)->nullable();
            $table->enum('status', ['belum selesai', 'selesai'])->default('belum selesai');
            $table->timestamps();

            $table->foreign('id_kegiatan')->references('id')->on('manajemenkegiatan')->onDelete('cascade');

            $table->foreign('id_oki')->references('id')->on('oki_baru')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('report');
    }
};
