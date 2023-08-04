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
      Schema::table('tyre_outputs', function(Blueprint $table) {
            $table->renameColumn('tyre_id', 'dimention_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
      Schema::table('tyre_outputs', function(Blueprint $table) {
            $table->renameColumn('dimention_id', 'tyre_id');
        });
    }
};
