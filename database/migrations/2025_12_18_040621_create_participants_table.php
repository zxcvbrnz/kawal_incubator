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
        Schema::create('participants', function (Blueprint $table) {
            $table->id();
            $table->string('business_name');
            $table->string('owner_name');
            $table->string('contact');
            $table->string('business_field');

            // --- PERBAIKAN ALAMAT ---
            $table->string('province'); // Tambahkan ini
            $table->string('city');
            $table->string('district');
            $table->string('village');
            $table->text('address_detail'); // Tambahkan ini (gunakan text karena jalan bisa panjang)
            $table->string('postal_code', 5); // Panjang kodepos selalu 5

            // Data Operasional
            $table->string('omset');
            $table->string('market_reach');

            // Media Sosial
            $table->string('ig')->nullable();
            $table->string('tiktok')->nullable();
            $table->string('fb')->nullable();
            $table->string('website')->nullable();
            $table->string('wa')->nullable();

            // Legalitas & Sertifikasi
            // Gunakan text jika user bisa memilih banyak pilihan, atau string jika satu saja
            $table->string('legalitas');
            $table->string('legalitas_other')->nullable();
            $table->string('certification');
            $table->string('certification_other')->nullable();

            // Logika Inkubasi
            $table->boolean('has_incubated')->default(false);
            $table->string('incubation_institution')->nullable();
            $table->date('incubation_start')->nullable();
            $table->date('incubation_end')->nullable();

            $table->text('description')->nullable();
            $table->string('profile_photo')->nullable();
            $table->string('business_profile_file')->nullable();
            $table->boolean('status')->default(false);
            $table->boolean('display')->default(false);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('participants');
    }
};