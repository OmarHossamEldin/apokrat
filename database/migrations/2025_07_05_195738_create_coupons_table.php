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
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->enum('discount_type', ['percentage', 'fixed'])->default('percentage');
            $table->decimal('max_discount_amount', 22, 2)->nullable();                    //Maximum discount amount
            $table->integer('coupon_count')->nullable();                                  //Maximum number of times to use
            $table->integer('coupon_count_per_user')->nullable();                         //Maximum number of times to use per one user
            $table->decimal('value', 22, 2);
            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->boolean('status')->default(1);
            $table->foreignId('admin_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coupons');
    }
};
