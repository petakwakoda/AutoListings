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
        Schema::create('automobiles', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->year('year');
            $table->integer('make');
            $table->foreignId('carmodel_id')->constrained();
            $table->timestamps();
            $table->unique(['make', 'carmodel_id', 'year']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('automobiles');
    }
};
