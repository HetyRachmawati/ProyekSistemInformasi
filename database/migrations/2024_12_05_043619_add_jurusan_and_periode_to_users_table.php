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
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('id_jurusan')->nullable()->after('jabatan');
            $table->unsignedBigInteger('id_periode')->nullable()->after('id_jurusan');

            $table->foreign('id_jurusan')->references('id')->on('jurusan')->onDelete('set null');
            $table->foreign('id_periode')->references('id')->on('periode')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['id_jurusan']);
            $table->dropForeign(['id_periode']);

            $table->dropColumn('id_jurusan');
            $table->dropColumn('id_periode');
        });
    }
};
