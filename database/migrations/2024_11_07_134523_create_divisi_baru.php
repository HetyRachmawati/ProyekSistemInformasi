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
            Schema::create('divisi_baru', function (Blueprint $table) {
                $table->id();
                $table->string('nama_divisi', 100);
                $table->unsignedBigInteger('id_oki');
                $table->timestamps();
            

                $table->foreign('id_oki')->references('id')->on('oki_baru')->onDelete('cascade');

            });
        }

        /**
         * Reverse the migrations.
         */
        public function down(): void
        {
            Schema::dropIfExists('divisi_baru');
        }
    };
