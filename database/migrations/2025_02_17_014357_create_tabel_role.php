<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB; // ✅ Pastikan ini ada

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tabel_role', function (Blueprint $table) {
            $table->id('role_id'); // Primary key dengan nama role_id
            $table->string('role_name'); // Nama role
            $table->string('role_description')->nullable(); // Deskripsi role (bisa kosong)
            $table->integer('role_salary'); // Gaji role
            $table->tinyInteger('role_status')->default(1); // Status role (default aktif)
            $table->timestamps();
        });

        // ✅ Gunakan DB::statement() tanpa backslash
        DB::statement('ALTER TABLE tabel_role AUTO_INCREMENT = 71001;');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tabel_role');
    }
};
