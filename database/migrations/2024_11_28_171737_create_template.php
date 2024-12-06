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
        Schema::create('template', function (Blueprint $table) {
            $table->id();
            $table->string('judul', 100)->nullable();
            $table->unsignedBigInteger('id_kategori');
            $table->text('deskripsi')->nullable();
            $table->string('gambar', 100)->nullable();
            $table->string('link_template')->nullable()->default('');
            $table->timestamps();
            $table->foreign('id_kategori')->references('id')->on('kategori_template')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};