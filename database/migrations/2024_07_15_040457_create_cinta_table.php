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
        Schema::create('cinta', function (Blueprint $table) {
            $table->id();
            $table->char('nim',10)->unique();
            $table->string('nama');
            $table->string('first_love');
            $table->string('nama_first_love');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cinta');
    }
};
