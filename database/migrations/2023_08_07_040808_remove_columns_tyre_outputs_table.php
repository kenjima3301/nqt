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
      Schema::table('tyre_outputs', function($table) {
            $table->dropColumn('user_id');
            $table->dropColumn('dealer_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
      Schema::table('tyre_outputs', function($table) {
            $table->integer('user_id');
            $table->integer('dealer_id');
        });
    }
};
