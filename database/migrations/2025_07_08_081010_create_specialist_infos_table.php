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
        Schema::create('specialist_infos', function (Blueprint $table) {
            $table->id();
            $table->string('years_of_experience');
            $table->string('medical_license')->unique();
            $table->foreignId('specialization_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('hsp_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('specialist_infos');
    }
};
