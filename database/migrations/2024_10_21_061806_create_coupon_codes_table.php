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
        Schema::create('coupon_codes', function (Blueprint $table) {
            $table->id();
            $table->string('coupon_name');
            $table->integer('discount');
            $table->integer('is_time')->comment('0 = One Time, 1 = Unlimited')->default(0);
            $table->integer('status')->comment('0 = Active, 1 = Deactive')->default(0);
            $table->integer('trash')->comment('1= Delete, 0 = Active')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coupon_codes');
    }
};

