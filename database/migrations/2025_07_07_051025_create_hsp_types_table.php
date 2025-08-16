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
        Schema::create('hsp_types', function (Blueprint $table) {
            $table->id();
            $table->foreignId('hsp_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('activity_type_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->unique(['hsp_id', 'activity_type_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hsp_types');
    }
};
