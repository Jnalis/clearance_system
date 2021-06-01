<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveColumnsFromResources extends Migration
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
            $table->dropForeign('resources_issued_by_foreign');
            $table->dropColumn('issued_by');


            $table->dropForeign('resources_issued_to_foreign');
            $table->dropColumn('issued_to');


            $table->dropColumn('issued');


            $table->dropColumn('date_to_return');
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
            $table->unsignedBigInteger('issued_by')->after('allocated_to')->nullable();
            $table->foreign('issued_by')
                ->references('id')
                ->on('staff')
                ->onDelete('cascade')->onUpdate('cascade');

            $table->unsignedBigInteger('issued_to')->after('issued_by')->nullable();
            $table->foreign('issued_to')
                ->references('id')
                ->on('students')
                ->onUpdate('cascade');

            $table->enum('issued', ['YES', 'NO'])->after('issued_to')->default('NO');

            $table->date('date_to_return')->after('issued')->nullable();
        });
    }
}
