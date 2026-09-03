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
        Schema::table('weddings', function (Blueprint $table) {
            $table->boolean('tudang_penni_enabled')->default(false)->after('maps_url');
            $table->string('tudang_penni_time', 100)->nullable()->after('tudang_penni_enabled');
            $table->string('tudang_penni_address', 500)->nullable()->after('tudang_penni_time');
            $table->string('tudang_penni_maps_url', 500)->nullable()->after('tudang_penni_address');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('weddings', function (Blueprint $table) {
            $table->dropColumn([
                'tudang_penni_enabled',
                'tudang_penni_time',
                'tudang_penni_address',
                'tudang_penni_maps_url',
            ]);
        });
    }
};
