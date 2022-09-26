<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('barcode')->nullable();
            $table->foreignId('brand_id')->nullable()->constrained('brands');
            $table->foreignId('measure_id')->nullable()->constrained('measures');
            $table->foreignId('category_id')->nullable()->constrained('categories');
            $table->decimal('buy', 8, 2)->default(0);
            $table->decimal('sale', 8, 2)->default(0);
            $table->decimal('min_stock', 8, 2)->default(0);
            $table->integer('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
};
