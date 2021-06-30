<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClearancetypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clearancetypes', function (Blueprint $table) {
            $table->id();
            $table->string('clearancetype');
            $table->string('added_by')->nullable();

            $table->foreign('added_by')
                ->references('username')
                ->on('staff')
                ->onUpdate('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clearancetypes');
    }
}
