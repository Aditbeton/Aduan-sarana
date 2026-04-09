<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('laporan_pengaduans', function (Blueprint $table) {
            $table->string('bukti')->nullable()->after('lokasi');
            $table->string('bukti_penanganan')->nullable()->after('bukti');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('laporan_pengaduans', function (Blueprint $table) {
            $table->dropColumn(['bukti', 'bukti_penanganan']);
        });
    }
};
