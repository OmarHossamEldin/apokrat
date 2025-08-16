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
        Schema::create('hsp_translations', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('tagline');
            $table->longText('about')->nullable();
            $table->string('locale')->index();
            $table->foreignId('hsp_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->unique(['hsp_id', 'locale']);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hsp_translations');
    }
};
