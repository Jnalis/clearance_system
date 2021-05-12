<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAllocatedToToResourcesTable extends Migration
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
            $table->unsignedBigInteger('allocated_to')->after('allocated_by')->nullable();
            $table->foreign('allocated_to')
                ->references('id')
                ->on('staff')
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
            $table->dropForeign('resources_allocated_to_foreign');
            $table->dropColumn('allocated_to');
        });
    }
}
