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
        Schema::create('tours', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('place');
            $table->foreignId('countries_id')->constrained('countries','id')->cascadeOnDelete();
            $table->integer('people');
            $table->integer('nights');
            $table->string('image')->default('default.jpg');
            $table->foreignId('operators_id')->constrained('operators','id')->cascadeOnDelete();
            $table->foreignId('rest_types_id')->constrained('rest_types','id')->cascadeOnDelete();
            $table->foreignId('accomodations_id')->constrained('accomodations','id')->cascadeOnDelete();
            $table->foreignId('meals_id')->constrained('meals','id')->cascadeOnDelete();
            $table->text('description');
            $table->integer('price');
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
        Schema::dropIfExists('tours');
    }
};
