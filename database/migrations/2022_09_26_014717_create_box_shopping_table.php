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
        Schema::create('box_shopping', function (Blueprint $table) {
            $table->id();
            $table->foreignId('box_id')->nullable()->constrained('boxes');
            $table->foreignId('shopping_id')->nullable()->constrained('shoppings');
            $table->decimal('amount', 8, 2)->default(0);
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
        Schema::dropIfExists('box_shopping');
    }
};
