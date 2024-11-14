<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('nim', 50)->nullable()->unique()->after('nama_lengkap'); // Mengizinkan NULL untuk unique
            $table->unsignedBigInteger('id_oki')->nullable()->after('nim');
            $table->unsignedBigInteger('id_divisi')->nullable()->after('id_oki');
            $table->string('no_hp', 20)->nullable()->after('id_divisi');
            $table->string('jabatan', 100)->nullable()->after('no_hp');
            $table->string('periode', 50)->nullable()->after('jabatan');
            $table->string('jurusan', 100)->nullable()->after('periode');
            $table->enum('status_keaktifan', ['aktif', 'nonaktif'])->default('aktif')->after('jurusan');
            
            // Tambahkan foreign key constraints
            $table->foreign('id_oki')->references('id')->on('oki_baru')->onDelete('cascade');
            $table->foreign('id_divisi')->references('id')->on('divisi_baru')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            // Hapus foreign key terlebih dahulu
            if (Schema::hasColumn('users', 'id_oki')) {
                $table->dropForeign(['id_oki']);
            }

            if (Schema::hasColumn('users', 'id_divisi')) {
                $table->dropForeign(['id_divisi']);
            }

        
            if (Schema::hasColumn('users', 'nim')) {
                $table->dropColumn('nim');
            }

            if (Schema::hasColumn('users', 'id_oki')) {
                $table->dropColumn('id_oki');
            }

            if (Schema::hasColumn('users', 'id_divisi')) {
                $table->dropColumn('id_divisi');
            }

            if (Schema::hasColumn('users', 'no_hp')) {
                $table->dropColumn('no_hp');
            }

            if (Schema::hasColumn('users', 'jabatan')) {
                $table->dropColumn('jabatan');
            }

            if (Schema::hasColumn('users', 'periode')) {
                $table->dropColumn('periode');
            }

            if (Schema::hasColumn('users', 'jurusan')) {
                $table->dropColumn('jurusan');
            }

            if (Schema::hasColumn('users', 'status_keaktifan')) {
                $table->dropColumn('status_keaktifan');
            }
        });
    }
};
