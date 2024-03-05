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
        Schema::table('informasi_umums', function (Blueprint $table) {
            $table->string('popup')->nullable();
            $table->boolean('popup_st')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('informasi_umums', function (Blueprint $table) {
            //
        });
    }
};
