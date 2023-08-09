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
        Schema::table('tyres', function (Blueprint $table) {
          $table->integer('model_id')->nullable()->change();
          $table->integer('brand_id')->nullable()->change();
          $table->integer('driveexperience_id')->nullable()->change();
          $table->string('tyre_structure')->nullable()->change();
          $table->text('tyre_features')->nullable()->change();
          $table->string('install_position_image')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tyres', function (Blueprint $table) {
          $table->integer('model_id')->nullable(false)->change();
          $table->integer('brand_id')->nullable(false)->change();
          $table->integer('driveexperience_id')->nullable(false)->change();
          $table->string('tyre_structure')->nullable(false)->change();
          $table->text('tyre_features')->nullable(false)->change();
          $table->string('install_position_image')->nullable(false)->change();
        });
    }
};
