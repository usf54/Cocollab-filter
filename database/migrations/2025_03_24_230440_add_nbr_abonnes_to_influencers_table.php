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
        Schema::table('influencers', function (Blueprint $table) {
            $table->integer('nbr_abonnes')->default(0)->after('influencerPlatforms'); // Adding the new column
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('influencers', function (Blueprint $table) {
            $table->dropColumn('nbr_abonnes'); // Dropping the column if we rollback
        });
    }
};
