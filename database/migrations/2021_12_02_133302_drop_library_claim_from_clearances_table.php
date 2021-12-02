<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropLibraryClaimFromClearancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('clearances', function (Blueprint $table) {
            //
            $table->dropColumn('library_claim');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('clearances', function (Blueprint $table) {
            //
            $table->enum('library_claim', ['NO','YES'])->default('NO')->nullable();
        });
    }
}
