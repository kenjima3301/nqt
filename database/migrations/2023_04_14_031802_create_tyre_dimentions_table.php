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
        Schema::create('tyre_dimentions', function (Blueprint $table) {
            $table->id();
            $table->integer('tyre_id');
            $table->string('size');
            $table->string('lr_pr');
            $table->string('sevice_index');
            $table->string('tread_depth');
            $table->string('standard_rim');
            $table->string('overall_diameter');
            $table->string('section_width');
            $table->string('single_kg');
            $table->string('single_lbs');
            $table->string('single_kpa');
            $table->string('single_psi');
            $table->string('dual_kg')->nullable();
            $table->string('dual_lbs')->nullable();
            $table->string('dual_kpa')->nullable();
            $table->string('dual_psi')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tyre_dimentions');
    }
};
