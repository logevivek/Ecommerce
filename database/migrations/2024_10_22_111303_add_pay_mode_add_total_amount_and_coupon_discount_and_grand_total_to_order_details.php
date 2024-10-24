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
        Schema::table('order_details', function (Blueprint $table) {
            $table->string('pay_mode')->after('pincode');
            $table->integer('total_amount')->after('pay_mode')->default(0);
            $table->integer('coupon_discount')->after('total_amount')->default(0);
            $table->integer('grand_total')->after('coupon_discount')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('order_details', function (Blueprint $table) {
            $table->dropColumn(['pay_mode', 'total_amount' , 'coupon_discount', 'grand_total']);
        });
    }
};
