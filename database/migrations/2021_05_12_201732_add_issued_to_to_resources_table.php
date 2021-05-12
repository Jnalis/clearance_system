<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIssuedToToResourcesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('resources', function (Blueprint $table) {
            //
            $table->unsignedBigInteger('issued_to')->after('issued_by')->nullable();
            $table->foreign('issued_to')
                ->references('id')
                ->on('students')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('resources', function (Blueprint $table) {
            //
            $table->dropForeign('resources_issued_to_foreign');
            $table->dropColumn('issued_to');
        });
    }
}
