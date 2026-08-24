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
        Schema::create('love_gifts', function (Blueprint $table) {
            $table->id();
            $table->string('type'); // transfer, qris, gift
            $table->string('holder_name');
            $table->string('bank_name')->nullable();
            $table->string('account_number')->nullable();
            $table->string('image')->nullable();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->unsignedinteger('sort_order')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('love_gifts');
    }
};
