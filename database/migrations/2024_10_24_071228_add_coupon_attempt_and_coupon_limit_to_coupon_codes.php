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
        Schema::table('coupon_codes', function (Blueprint $table) {
            $table->integer('coupon_attempt')->default(0)->after('discount')->comment('0 = Unlimited Time');
            $table->integer('coupon_limit')->after('coupon_attempt')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('coupon_codes', function (Blueprint $table) {
            $table->dropColumn(['coupon_attempt', 'coupon_limit']);
        });
    }
};
