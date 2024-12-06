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
            if (Schema::hasColumn('users', 'periode')) {
                $table->dropColumn('periode');
            }

            if (Schema::hasColumn('users', 'jurusan')) {
                $table->dropColumn('jurusan');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('periode', 50)->nullable()->after('jabatan');
            $table->string('jurusan', 100)->nullable()->after('periode');
        });
    }
};
