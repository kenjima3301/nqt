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
        Schema::create('tyres', function (Blueprint $table) {
            $table->id();
            $table->string('name',200);
            $table->integer('model_id');
            $table->integer('brand_id');
            $table->integer('driveexperience_id');
            $table->string('tyre_structure',200);
            $table->text('tyre_features');
            $table->string('install_position_image');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tyres');
    }
};
