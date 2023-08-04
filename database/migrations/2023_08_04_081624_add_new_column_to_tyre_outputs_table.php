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
        Schema::table('tyre_outputs', function (Blueprint $table) {
          $table->string('dealer_id')->after('user_id')->nullable();
          $table->string('status')->after('quantity')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tyre_outputs', function (Blueprint $table) {
          $table->dropColumn('user_id');
          $table->dropColumn('status');
        });
    }
};
