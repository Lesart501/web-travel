<?php

declare(strict_types=1);

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
        Schema::create('tours', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('place');
            $table->foreignId('countries_id')->nullable()->constrained('countries','id')->nullOnDelete();
            $table->integer('people');
            $table->integer('nights');
            $table->string('image')->nullable()->default('default.jpg');
            $table->foreignId('operators_id')->constrained('operators','id')->cascadeOnDelete();
            $table->foreignId('rest_types_id')->nullable()->constrained('rest_types','id')->nullOnDelete();
            $table->foreignId('accomodations_id')->nullable()->constrained('accomodations','id')->nullOnDelete();
            $table->foreignId('meals_id')->nullable()->constrained('meals','id')->nullOnDelete();
            $table->text('description')->nullable();
            $table->decimal('price');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tours');
    }
};
