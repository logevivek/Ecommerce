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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('pro_id');
            $table->string('pro_name');
            $table->integer('cat_id');
            $table->string('pro_img');
            $table->text('pro_desc');
            $table->decimal('pro_price', 8, 2);
            $table->integer('pro_quantity');
            $table->integer('status')->default(0);
            $table->integer('trash')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
