<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRefundedStatusToLostResources extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('lost_resources', function (Blueprint $table) {
            //
            $table->enum('refunded_status', ['REFUNDED','NOT REFUNDED'])->default('NOT REFUNDED')->after('added_by');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('lost_resources', function (Blueprint $table) {
            //
            $table->dropColumn('refunded_status');
        });
    }
}
