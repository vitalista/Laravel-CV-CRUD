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
        Schema::create('education', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cv_id'); 
            $table->string('tertiary');
            $table->string('tertiary_sy_start');
            $table->string('tertiary_sy_end'); 
            $table->string('secondary');
            $table->string('secondary_sy_start');
            $table->string('secondary_sy_end'); 
            $table->string('primary');
            $table->string('primary_sy_start'); 
            $table->string('primary_sy_end'); 
            $table->timestamps(); 

            $table->foreign('cv_id')->references('id')->on('cvs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('education');
    }
};
