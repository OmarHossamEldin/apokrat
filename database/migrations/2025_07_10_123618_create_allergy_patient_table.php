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
        Schema::create('allergy_patient', function (Blueprint $table) {
            $table->id();
            $table->foreignId('allergy_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('patient_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->unique(['allergy_id', 'patient_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('allergy_patient');
    }
};
