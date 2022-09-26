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
        Schema::create('box_movements', function (Blueprint $table) {
            $table->id();
            $table->string('reason')->nullable();
            $table->foreignId('box_id')->nullable()->constrained('boxes');
            $table->decimal('amount', 8, 2)->default(0);
            $table->integer('type')->default(1);
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
        Schema::dropIfExists('box_movements');
    }
};
