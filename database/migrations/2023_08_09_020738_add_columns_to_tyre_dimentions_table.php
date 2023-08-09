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
        Schema::table('tyre_dimentions', function (Blueprint $table) {
          $table->string('ply')->after('size')->nullable();
          $table->string('unit')->after('ply')->nullable();
          $table->string('tread_type')->after('unit')->nullable();
          $table->string('total')->after('tread_type')->nullable();
          $table->string('price')->after('total')->nullable();
          $table->string('lr_pr')->nullable()->change();
          $table->string('sevice_index')->nullable()->change();
          $table->string('tread_depth')->nullable()->change();
          $table->string('standard_rim')->nullable()->change();
          $table->string('overall_diameter')->nullable()->change();
          $table->string('section_width')->nullable()->change();
          $table->string('single_kg')->nullable()->change();
          $table->string('single_lbs')->nullable()->change();
          $table->string('single_kpa')->nullable()->change();
          $table->string('single_psi')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tyre_dimentions', function (Blueprint $table) {
          $table->dropColumn('ply');
          $table->dropColumn('unit');
          $table->dropColumn('tread_type');
          $table->dropColumn('total');
          $table->dropColumn('price');
          $table->string('lr_pr')->nullable(false)->change();
          $table->string('sevice_index')->nullable(false)->change();
          $table->string('tread_depth')->nullable(false)->change();
          $table->string('standard_rim')->nullable(false)->change();
          $table->string('overall_diameter')->nullable(false)->change();
          $table->string('section_width')->nullable(false)->change();
          $table->string('single_kg')->nullable(false)->change();
          $table->string('single_lbs')->nullable(false)->change();
          $table->string('single_kpa')->nullable(false)->change();
          $table->string('single_psi')->nullable(false)->change();
        });
    }
};
