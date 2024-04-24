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
        Schema::table('section_contents', function (Blueprint $table) {
          $table->text('content')->after('name_en')->nullable();
          $table->text('content_en')->after('name_en')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('section_contents', function (Blueprint $table) {
          $table->dropColumn('content');
          $table->dropColumn('content_en');
        });
    }
};
