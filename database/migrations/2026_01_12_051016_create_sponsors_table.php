<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // 1. nama (pakai tanda bintang)
    // 2. No kontak (pakai tanda bintang)
    // 3. email (pakai tanda bintang)
    // 4. deskripsi permohonan (pakai tanda bintang)
    // 5. upload proposal ( kd usah pakai tanda bintang)
    public function up(): void
    {
        Schema::create('sponsors', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('contact');
            $table->string('email');
            $table->string('description');
            $table->string('proposal_file')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sponsors');
    }
};