<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDateToReturnToIssuedResources extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('issued_resources', function (Blueprint $table) {
            //
            $table->date('date_to_return')->after('issued_by')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('issued_resources', function (Blueprint $table) {
            //
            $table->dropColumn('date_to_return');
        });
    }
}
