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
        Schema::create('weddings', function (Blueprint $table) {
            $table->id();
            $table->string('groom_short_name');
            $table->string('groom_full_name');
            $table->string('groom_title')->default('Putra');
            $table->string('groom_father');
            $table->string('groom_mother');
            $table->string('groom_photo')->nullable();
            $table->string('bride_short_name');
            $table->string('bride_full_name');
            $table->string('bride_title')->default('Putri');
            $table->string('bride_father');
            $table->string('bride_mother');
            $table->string('bride_photo')->nullable();
            $table->string('cover_photo')->nullable();
            $table->string('background_image')->nullable();
            $table->datetime('wedding_at');
            $table->string('akad_time')->default('Pukul 10.00 WIB - Selesai');
            $table->string('resepsi_time')->default('Pukul 13.00 WIB - Selesai');
            $table->string('address');
            $table->string('maps_url')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('weddings');
    }
};
