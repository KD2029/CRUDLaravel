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
        Schema::create('nutrition_information', function (Blueprint $table) {
            $table->id();
            $table->foreignId('food_id')->constrained('foods');
            $table->string('serving_size');
            $table->integer('calories');
            $table->integer('protein');
            $table->integer('fat');
            $table->integer('carbohydrates');
            $table->integer('fibre');
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
        Schema::dropIfExists('nutrition_information');
    }
};
